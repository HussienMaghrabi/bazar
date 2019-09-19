<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement_favourite extends Model
{
    protected $fillable = [
        'user_id',
        'adv_id'
    ];
}
