<?php

namespace App\Http\Controllers\Api;

use App\Board;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateBoardrequest;
use App\Http\Requests\UpdateBoardRequest;
use App\Moderator;
use Illuminate\Http\Request;
use JWTAuth;

class BoardController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    private $user;

    /**
     * Initialize controller instance.
     */
    public function __construct()
    {
        $this->middleware('jwt.auth');

        $this->user = JWTAuth::parseToken()->authenticate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->user
            ->boards()
            ->latest()
            ->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CreateBoardrequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateBoardrequest $request)
    {
        $board = Board::create($request->all());

        $board->users()->attach($this->user);
        $board->moderators()->attach(Moderator::findByUserIdOrCreate($this->user->id));

        return response()->json($board, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Board::forUser($this->user)
                    ->whereId($id)
                    ->firstOrFail();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBoardRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateBoardRequest $request, $id)
    {
        $board = Board::forUser($this->user)
                      ->whereId($id)
                      ->firstOrFail();

        $board->fill($request->all());
        $board->save();

        return response()->json($board, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $board = $board = Board::forUser($this->user)
                               ->whereId($id)
                               ->firstOrFail();

        $board->delete();

        return response()->json(['message' => 'Board was deleted']);
    }

    /**
     * Access board via pincode
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function accessViaPincode(Request $request)
    {
        $board = Board::where('pincode', $request->get('pincode'))->firstOrFail();

        if(! $board->users()->where('user_id', $this->user->id)->first())
            $board->users()->attach($this->user);

        return $board;
    }
}