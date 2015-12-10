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
