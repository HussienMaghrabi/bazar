<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'image',
        'category_id',
    ];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['name'] = $this->serv_name;
        $data['image'] = $this->serv_image;
        return $data;
    }

    public function getServImageAttribute()
    {
        $attribute = "";
        if ($this->image)
            $attribute = $this->image;
        return $attribute;
    }

    public function getServNameAttribute()
    {
        if (\request()->lang == "en")
            return $this->name_en;
        else
            return $this->name_ar;
    }
}

