// Frontend.

$(document).on('click', '.edit-comment', function(e) {
    e.preventDefault();

    var modal = $(this).parents('.comment').find('.moderator-edit-modal');

    modal.find('form #status').val(modal.find('form').data('comment-status'));

    modal.modal();
});

$(document).on('submit', '.moderator-edit-modal form', function(e) {
    e.preventDefault();

    $.ajax({
        url: '/moderator/boards/' + $(this).data('board-id') + '/comments/' + $(this).data('comment-id'),
        type: 'PUT',
        data: $(this).serialize(),
        success: function() {
            location.reload();
        }
    })
});

$(document).on('click', '.delete-comment', function(e) {
    e.preventDefault();

    var self = $(this);

    bootbox.confirm('Do you really want to delete this comment?', function(result) {
        if (result) {
            $.ajax({
                url: '/moderator/boards/' + self.data('board-id') + '/comments/' + self.data('comment-id'),
                type: 'DELETE',
                success: function() {
                    location.reload();
                }
            });
        }
    });
});

//links
$(document).on('click', '.deactivate-link-toggle', function(e) {
    e.preventDefault();

    var invite_id = $(this).val();

    bootbox.confirm('Do you really want to deactivate this link?', function(result) {
        if (result) {
            $.ajax({
                url: '/Deactivate' + '/' + invite_id,
                type: 'POST',

                success: function() {
                    location.reload();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
});
$(document).on('click', '.activate-link-toggle', function(e) {
    e.preventDefault();

    var invite_id = $(this).val();

    bootbox.confirm('Do you really want to activate this link?', function(result) {
        if (result) {
            $.ajax({
                url: '/activate' + '/' + invite_id,
                type: 'POST',

                success: function() {
                    location.reload();
                    console.log(invite_id);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
});
$(document).on('click', '.delete-link-toggle', function(e) {
    e.preventDefault();

    var url = "/invites";
    var invite_id = $(this).val();
    bootbox.confirm('Do you really want to delete this link?', function(result) {
        if (result) {
    $.ajax({
        type: 'DELETE',
        url: url + '/' + invite_id,
        success: function (data) {
            console.log(data);

            $("#invite" + invite_id).remove();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
        }
    });
});

$(document).on('click', '.remove-user-toggle', function(e) {
    e.preventDefault();

    var user_id = $(this).val();
    var self = $(this);

    bootbox.confirm('Do you really want to remove this user?', function(result) {
        if (result) {
            $.ajax({
                type: 'POST',
                url: '/remove/' + user_id + '/' + self.data('board-id'),

                success: function (data) {
                    location.reload();
                    console.log(data);

                    $("#user" + user_id).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
});

// Admin.
$(document).on('click', '.ban-user-toggle', function(e) {
    e.preventDefault();

    var self = $(this);

    bootbox.confirm('Do you really want to ban this user?', function(result) {
        if (result) {
            $.ajax({
                url: '/moderator/boards/' + self.data('board-id') + '/bans',
                type: 'POST',
                data: {
                    ip_address: self.data('user-ip')
                },
                success: function() {
                    location.reload();
                }
            });
        }
    });
});

$(document).on('click', '.delete-ban-toggle', function(e) {
    e.preventDefault();

    var self = $(this);

    bootbox.confirm('Do you really want to unban this person?', function(result) {
        if (result) {
            $.ajax({
                url: self.attr('href'),
                type: 'DELETE',
                success: function() {
                    location.reload();
                }
            });
        }
    });
});
$(document).on('click', '.delete-board-toggle', function(e) {
    e.preventDefault();

    var board_id = $(this).val();

    bootbox.confirm('Woah do you really want to delete your board, no backsies!', function(result) {
        if (result) {
            $.ajax({
                type: 'DELETE',
                url: 'boom' + '/' + board_id,
                success: function (data) {
                    console.log(data);

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
});
$(document).on('click', '.remove-board-toggle', function(e) {
    e.preventDefault();

    var board_id = $(this).val();
    var self = $(this);

    bootbox.confirm('Do you really want to remove this board?', function(result) {
        if (result) {
            $.ajax({
                type: 'POST',
                url: '/remove/' + self.data('user-id') + '/' + board_id,

                success: function (data) {
                    window.location.href = '/board';
                        console.log(data);

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
});