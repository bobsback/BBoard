<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInviteRequest;
use App\Invite;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class LinksController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreInviteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function postIndex(Request $request)
    {
        $board = Board::whereId($request->get('board_id'))->firstOrFail();

        $invite = Invite::firstOrCreate([
            'email' => 'random',
            'board_id' => $board->id
        ]);
        $invite->load('board');

        // update pincode on non-first invite
        $invite->pincode = $invite->board->pincode;
        $invite->save();


        if($request->ajax())
            return response()->json($invite, 201);

        return redirect()->back();
    }
}
