<?php

namespace Hazzard\Comments\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use Hazzard\Comments\Comments\Comment;
use Hazzard\Comments\Jobs\DeleteComment;
use Hazzard\Comments\Jobs\UpdateComment;
use Hazzard\Comments\Jobs\BulkCommentUpdate;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Hazzard\Comments\Http\Middleware\Moderator;
use Hazzard\Comments\Jobs\FetchCommentsModerator;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Class ModeratorDashboardController
 *
 * @package Hazzard\Comments\Http\Controllers
 */
class ModeratorDashboardController extends BaseDashboardController
{

    use DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        app('comments');

        Comment::$admin = true;

        $this->middleware(Moderator::class);
    }

    /**
     * List all comments.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $board = Board::findOrFail($id);

        $args = [
            'page' => (int) $request->input('page', 1),
            'status' => $request->input('status', 'all'),
            'pageId' => $request->input('page_id'),
            'board' => $board
        ];

        if ($request->ajax()) {
            return \Response::json($this->dispatch(new FetchCommentsModerator($args)));
        }

        return view('comments::moderator.dashboard', $args);
    }

    /**
     * Update a specified comment.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $boardId, $id = null)
    {
        if ($ids = $request->input('ids')) {
            return $this->dispatch(new BulkCommentUpdate($ids, $request->input('status')));
        }

        $input = $request->only('author_name', 'author_email', 'author_url', 'content', 'status');
        $input['author_name'] = e($input['author_name']);

        $validator = $this->validateForUpdate($input);

        if ($validator->fails()) {
            $errors = $validator->errors();

            foreach ($input as $key => $value) {
                if ($errors->has($key)) {
                    unset($input[$key]);
                }
            }
        }

        $comment = Comment::findOrFail($id);

        $this->dispatch(new UpdateComment($comment, $input));

        return \Response::json($comment);
    }

    /**
     * Delete the specified comment.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $boardId, $id)
    {
        $this->dispatch(new DeleteComment($id));

        return \Response::json(null, 204);
    }

}
