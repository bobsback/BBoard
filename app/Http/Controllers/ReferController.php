<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\referRequest;
use Mail;

class ReferController extends Controller
{
    public function store(referRequest $request)
    {
        $email = $request->get('email');

        Mail::queue('emails.refer', ['email' => $email], function($message) use ($email)
        {
            $message->subject('test');
            $message->from('noreply@bubbleboard.com');
            $message->to($email);
        });

        return redirect()->to('/')->with('message', 'Thanks for refering someone!');
    }
}
