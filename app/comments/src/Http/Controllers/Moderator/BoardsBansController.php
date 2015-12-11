<?php

namespace Hazzard\Comments\Http\Controllers\Moderator;

use App\Board;
use App\BoardBan;
use Illuminate\Http\Request;
use Hazzard\Comments\Http\Middleware\Moderator;
use Hazzard\Comments\Http\Controllers\BaseDashboardController;

/**
 * Class BoardsBansController
 *
 * @package Hazzard\Comments\Http\Controllers\Moderator
 */
class BoardsBansController extends BaseDashboardController
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
     * Store.
     *
     */
    public function store(Request $request, $boardId)
    {
        $board = Board::findOrFail($boardId);

        $boardBan = new BoardBan([
            'board_id' => $board->id,
            'ip_address' => ip2long(request()->input('ip_address'))
        ]);

        $boardBan->save();
    }

}
