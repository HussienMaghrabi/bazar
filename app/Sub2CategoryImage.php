<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sub2CategoryImage extends Model
{
    //
    protected $guarded = [];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['image'] = $this->serv_image;
        return $data;
    }


    public function getImageAttribute($value)
    {
        if ($value)
        {
            return asset(Storage::url($value));
        }
    }

    public function getServImageAttribute()
    {
        $att = '';
        if ($this->image)
            $att = $this->image;
        return $att;
    }



}
