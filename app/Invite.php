<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'board_id',
        'pincode'
    ];

    public function board()
    {
        return $this->belongsTo('App\Board');
    }
}