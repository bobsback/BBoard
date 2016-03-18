<?php

namespace App\Http\Requests;

use Route;

class UpdateBoardRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'boardname'=>'required|max:50|min:2,boardname|unique:boards,boardname,' . Route::input('boards'),
            'pincode'=>'required|max:20|min:3,pincode|unique:boards,pincode,' . Route::input('boards')
        ];
    }
}