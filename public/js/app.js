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
                url: '/comments/moderator/' + self.data('board-id') + '/' + self.data('comment-id'),
                type: 'DELETE',
                success: function() {
                    location.reload();
                }
            });
        }
    });
});
