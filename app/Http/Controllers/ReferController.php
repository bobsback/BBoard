<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\referRequest;
use Mail;
use Illuminate\Http\Request;

class ReferController extends Controller
{
    public function store(referRequest $request)
    {
       /* $email = $request->get('email');

        \Mail::queue('emails.refer', ['email' => $email], function($message) use ($email)
        {
            $message->subject('Someone just referred you to Bubble Board. omg exciting!');
            $message->from('noreply@bubbleboard.com');
            $message->to($email);
        });*/
        $email = $request->get('email');
        \Mail::send('emails.refer',
            array(

                'email' => $request->get('email')

            ), function($message) use ($email)
            {

                $message->from('rob@bubbleboard.co.uk');
                $message->to($email, 'Admin')->subject('Someone just referred you to Bubble Board. omg exciting!');

            });

        return redirect()->to('/')->with('status', 'Thanks for refering someone!');
    }
}
