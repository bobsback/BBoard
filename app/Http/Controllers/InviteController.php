<?php

namespace App\Http\Controllers;

use App\Board;
use App\Http\Requests\StoreInviteRequest;
use App\Invite;
use App\Http\Requests;
use Mail;

class InviteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreInviteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function postIndex(StoreInviteRequest $request)
    {
        $board = Board::whereId($request->get('board_id'))->firstOrFail();

        $invite = Invite::firstOrCreate([
            'email' => $request->get('email'),
            'board_id' => $board->id
        ]);
        $invite->load('board');

        // update pincode on non-first invite
        $invite->pincode = $invite->board->pincode;
        $invite->save();

        Mail::queue('emails.invite', ['data' => $invite->toArray()], function($message) use ($invite)
        {
            $message->subject('Invite to bubble boad');

            $message->to($invite->email);
            $message->from('noreply@bubbleboard.com', 'Bubble Board Inc.');
        });

        if($request->ajax())
            return response()->json($invite, 201);

        return redirect()->back()->with('success', 'Invite was sent successfully');
    }
}