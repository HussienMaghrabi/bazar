<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name_en',
        'name_ar',
        'country_id',
    ];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['name'] = $this->serv_name;
        return $data;
    }

    public function getServNameAttribute()
    {
        if (\request()->lang == "en")
            return $this->name_en;
        else
            return $this->name_ar;
    }

    public function getNameAttribute()
    {
        if (\request()->lang == "en")
            return $this->name_en;
        else
            return $this->name_ar;
    }

    public function getDashNameAttribute()
    {
        if (app()->getLocale() == "en")
            return $this->name_en;
        else
            return $this->name_ar;
    }

    public function getDashCountryNameAttribute()
    {
        $att = '';
        if ($this->country)
            $att = $this->country->dash_name;
        return $att;
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
