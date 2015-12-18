<?php

namespace App\Http\Controllers;

use App\Board;
use App\Moderator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckIfBanned;
use App\Http\Requests\CreateBoardrequest;
use App\Http\Middleware\CheckIfBoardSaved;

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

        $this->middleware(Authenticate::class, ['only' => 'create']);

        $this->middleware(CheckIfBanned::class, ['except' => ['index', 'store']]);

        $this->middleware(CheckIfBoardSaved::class, ['only' => ['show']]);
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

        $board->moderators()->attach(Moderator::findByUserIdOrCreate(\Auth::user()->id));

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

    /**
     * Get authorize.
     *
     */
    public function getAuthorize(Board $board)
    {
        return view('board.authorize')->with(compact('board'));
    }

    /**
     * Post authorize.
     *
     */
    public function postAuthorize(Request $request, Board $board)
    {
        if ($board->pincode != $request->input('pincode')) {
            return redirect()->route('board.authorize', $board->boardname)->with('error', 'Invalid PIN Code provided');
        }

        session()->set('board.' . $board->id . '.authorized', true);

        return redirect()->to('board/' . $board->boardname);
    }

}
