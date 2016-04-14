<?php

namespace App\Http\Controllers;

use App\Board;
use App\Moderator;
use App\Http\Requests;
use App\Services\AuthPinService;
use Auth;
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
     * @param \App\Services\AuthPinService $authPinService
     */
    public function __construct(Board $board, AuthPinService $authPinService)
    {
        $this->board = $board;
        $this->user = Auth::user();
        $this->authPinService = $authPinService;

        $this->middleware(Authenticate::class, ['only' => ['index', 'create', 'save']]);
        $this->middleware(CheckIfBanned::class, ['except' => ['index', 'update', 'store', 'save']]);
        $this->middleware(CheckIfBoardSaved::class, ['only' => ['show', 'save']]);
    }

    /**
     * Index.
     *
     */
    public function index()
    {
        $boards = $this->user->boards()->get();

        return view('board', compact('boards'));
    }

    /**
     * Show.
     *
     */
    public function show(Board $board)
    {
        $boards = [];
        if ($this->user) {
            $boards = $this->user->boards()->get();
        }

        return view('theboard', compact('board', 'boards'));
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

        $board->users()->attach($this->user);

        $board->moderators()->attach(Moderator::findByUserIdOrCreate($this->user->id));

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
     * @param \Illuminate\Http\Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function accessViaPincode(Request $request)
    {
        if (! $board = Board::where('pincode', '=', $request->input('pincode'))->first()) {
            return redirect('/')->withErrors(['The board pin code you entered does not match any currently in use :(', 'The Message']);
        }

        $this->authPinService->login($board);

        return redirect('board/' . $board->boardname);
    }

    public function getAuthorize(Board $board)
    {
        return view('board.authorize')->with(compact('board'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Board $board
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAuthorize(Request $request, Board $board)
    {
        $this->validate($request, [
            'pincode' => 'required'
        ]);

        if($board->pincode !== $request->get('pincode'))
            return redirect()->back()->withErrors(['pincode' => 'Incorrect pincode']);

        $this->authPinService->login($board);

        return redirect('board/' . $board->boardname);
    }

    /**
     * Save.
     *
     */
    public function save(Request $request, Board $board)
    {
        if (!$board->users->contains($this->user)) {
            $board->users()->attach($this->user);
        }

        return redirect()->back();
    }
}