<?php

namespace Hazzard\Comments\Http\Controllers\Moderator;

use App\Board;
use App\BoardBan;
use Illuminate\Http\Request;
use Hazzard\Comments\Http\Middleware\Moderator;
use Hazzard\Comments\Http\Controllers\BaseDashboardController;

use Hazzard\Comments\Comments\Comment;
use Hazzard\Comments\Jobs\DeleteComment;
use Hazzard\Comments\Jobs\UpdateComment;
use Hazzard\Comments\Jobs\BulkCommentUpdate;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Hazzard\Comments\Jobs\FetchCommentsModerator;
use Hazzard\Comments\Http\Middleware\BoardModerator;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Class BoardsController
 *
 * @package Hazzard\Comments\Http\Controllers\Moderator
 */
class BoardsController extends BaseDashboardController
{
    use DispatchesJobs, ValidatesRequests;
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {

        app('comments');

        Comment::$admin = true;

        $this->middleware(Moderator::class);
    }

    /**
     * Index.
     *
     */
    public function index(Request $request)
    {
        $boards = \Auth::user()->moderator->boards;

        return view('comments::moderator.boards.index')->with(compact('boards'));
    }

    /**
     * Edit.
     *
     */
    public function edit(Request $request)
    {
        $board = Board::findOrFail($request->boards);
        $boards = \Auth::user()->moderator->boards;

        $args = [
            'page' => (int) $request->input('page', 1),
            'status' => $request->input('status', 'all'),
            'pageId' => $request->input('page_id'),
            'board' => $board
        ];

        if ($request->ajax()) {
            return \Response::json($this->dispatch(new FetchCommentsModerator($args)));
        }


        return view('comments::moderator.boards.edit', $args)->with(compact('board','boards'));
    }

    /**
     * Update.
     *
     */
    public function update(Request $request)
    {
        $board = Board::findOrFail($request->boards);

        $board->fill($request->input())->save();

        $boards = \Auth::user()->moderator->boards;

        return redirect()->back()->with('updatesuccess', 'Board details were updated successfully');
    }

    public function invites(Request $request)
    {
        $boards = \Auth::user()->moderator->boards;

        return view('comments::moderator.boards.invite')->with(compact('boards'));
    }

}
