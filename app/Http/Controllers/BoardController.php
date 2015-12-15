<?php

namespace App\Http\Controllers;

use App\Board;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckIfBanned;
use App\Http\Requests\CreateBoardrequest;

/**
 * Class BoardController
 *
 * @package App\Http\Controllers
 */
class BoardController extends Controller
{

    /**
     * Initialize controller instance.
     *
     * @param Board $board
     */
    public function __construct(Board $board)
    {
        $this->board = $board;

        $this->middleware(CheckIfBanned::class, ['except' => 'index']);
    }

    /**
     * Index.
     *
     */
    public function index(Board $board)
    {
        $boards = $board->get();

        return view('board', compact('boards'));
    }

    /**
     * Show.
     *
     */
    public function show(Board $board)
    {
        return view('theboard', compact('board'));
    }

    /**
     * Edit.
     *
     */
    public function edit(Board $board)
    {
        return view('boardedit', compact('board'));
    }

    /**
     * Update.
     *
     */
    public function update(Board $board, Request $request)
    {
        $board->fill($request->input())->save();

        return redirect('board');
    }

    /**
     * Create.
     *
     */
    public function create(Board $board, Request $request)
    {
        return view('build');
    }

    /**
     * Store.
     *
     */
    public function store(Board $board, CreateBoardrequest $request)
    {
        $board = $board->create($request->all());

        $board->moderators()->attach(\Auth::user());

        return redirect('board');
    }

    /**
     * Destroy.
     *
     */
    public function destroy(Board $board)
    {
        $board->delete();

        return redirect('board');
    }

    /**
     * Access via pincode.
     *
     */
    public function accessViaPincode(Request $request)
    {
        if (!($board = Board::where('pincode', '=', $request->input('pincode'))->first())) {
            return redirect('/');
        }

        return redirect('board/' . $board->boardname);
    }

}
