<?php

/**
 * This file is part of Ajax Comment System for Laravel™.
 *
 * (c) HazzardWeb <hazzardweb@gmail.com>
 *
 * For the full copyright and license information, please visit:
 * http://codecanyon.net/licenses/standard
 */

namespace Hazzard\Comments\Events;
require "pusher.php";

use Hazzard\Comments\Comments\Comment;

class CommentWasPosted
{
    /**
     * @var \Hazzard\Comments\Comments\Comment
     */
    public $comment;

    /**
     * Create a new event instance.
     *
     * @param \Hazzard\Comments\Comments\Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function pushercomments (Comment $comment){
        $options = array(
            'cluster' => 'eu',
            'encrypted' => true
        );
        $pusher = new Pusher(
            '6968b67c61f3f66c432d',
            '4eb7e48a421981d102cf',
            '207449',
            $options
        );

        $data['message'] = 'hello world';
        $pusher->trigger('comments_channel', 'newcomment', $comment->toJson());

    }
}
