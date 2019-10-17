<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    public function getTime()
    {
        $tim = Notification::find($this->id)->created_at;
        $time =  date("d M Y", strtotime($tim));
        return $time;
    }
}
