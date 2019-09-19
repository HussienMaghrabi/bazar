<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement_images extends Model
{
    protected  $fillable = [
        'adv_id',
        'image',
    ];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['image'] = $this->serv_image;
        return $data;
    }
    public function getServImageAttribute()
    {
        $att = '';
        if ($this->image)
            $att = $this->image;
        return $att;
    }



}
