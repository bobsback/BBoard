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

class BoardAPIController extends Controller
{

    /**
     * Initialize controller instance.
     *
     * @param Board $board
     */
    public function __construct(Board $board)
    {
        $this->board = $board;

        $this->user = \Auth::user();

        $this->middleware(Authenticate::class, ['only' => [ 'create', 'save']]);

        $this->middleware(CheckIfBanned::class, ['except' => ['index', 'update', 'store', 'save']]);

        $this->middleware(CheckIfBoardSaved::class, ['only' => ['show', 'save']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Board::all();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function accessViaPincode()
    {

    }
}
