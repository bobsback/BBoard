<?php

namespace Hazzard\Comments\Http\Controllers\Moderator;

use Illuminate\Http\Request;
use Hazzard\Comments\Http\Middleware\Moderator;
use Hazzard\Comments\Http\Controllers\BaseDashboardController;

/**
 * Class BoardsController
 *
 * @package Hazzard\Comments\Http\Controllers\Moderator
 */
class BoardsController extends BaseDashboardController
{

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware(Moderator::class);
    }

    /**
     * Index.
     *
     */
    public function index(Request $request)
    {
        $boards = \Auth::user()->boards;

        return view('comments::moderator.boards.index')->with(compact('boards'));
    }

}
