<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;

class AboutController extends Controller
{
    public function create()
    {
        return view('about.contact');
    }

public function store(ContactFormRequest $request)
{

    \Mail::send('emails.contact',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message)
        {
            $message->from('robseger92@gmail.com');
            $message->to('robseger92@gmail.com', 'Admin')->subject('BB Contact Form');
        });

    return view('about')->with('status', 'Thanks for contacting us!');

}
}
