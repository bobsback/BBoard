<?php

namespace App\Services;

use App\Board;
use Session;

class AuthPinService
{
    /**
     * Check if guest user is authenticated
     *
     * @param \App\Board $board
     * @return bool
     */
    public function check(Board $board)
    {
        return Session::has('pincodeAccess') === true
            && Session::get('pincodeAccess.boardname') === $board->boardname
            && Session::get('pincodeAccess.authorized') === true;
    }

    /**
     * Login current guest user
     *
     * @param \App\Board $board
     * @return void
     */
    public function login(Board $board)
    {
        Session::set('pincodeAccess', [
            'boardname' => $board->boardname,
            'authorized' => true,
            'pincode' => $board->pincode
        ]);
    }

    /**
     * Logout current guest user
     *
     * @return void
     */
    public function logout()
    {
        Session::forget('pincodeAccess');
    }
}