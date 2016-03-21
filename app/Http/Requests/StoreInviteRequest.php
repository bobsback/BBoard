<?php

namespace App\Http\Requests;

use Auth;

class StoreInviteRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->isModerator($this->get('board_id'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'board_id' => 'required|integer|exists:boards,id',
            'email' => 'required|email'
        ];
    }
}
