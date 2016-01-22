<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\referRequest;

class ReferController extends Controller
{
    public function store(referRequest $request)
    {
        \Mail::send('emails.refer',
            array(
                'email' => $request->get('email'),
            ), function($message)
            {
                $message->from('robseger92@gmail.com');
                $message->to('robseger92@gmail.com', 'Admin')->subject('This person wants to be refered');
            });

        return \Redirect::route('/')
            ->with('message', 'Thanks for refering someone!');

    }
}
