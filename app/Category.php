<?php

namespace App;

use App\ModulesConst\CategoryIsSaleAndRent;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    
    
     public function toArray()
    {
        $data['id'] = $this->id;
        $data['name'] = $this->serv_name;
        $data['image'] = $this->serv_image;
        $data['has_subcategory'] = $this->serv_has_subcategory;
        $data['next'] = $this->serv_next;
        return $data;
    }

    public function getServNextAttribute()
    {
        $attribute = "";
        if ($this->serv_has_subcategory == true)  {
            $attribute =  1;
        } else {
            $attribute = 0;
        }
        return $attribute;
    }


    public function getServHasSubcategoryAttribute()
    {
        $attribute = "";
        if (count($this->sub_categories) > 0) {
            $attribute = true;
        } else {
            $attribute = false;
        }
        return $attribute;
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

    public function getDashNameAttribute()
    {
        if (app()->getLocale() == "en")
            return $this->name_en;
        else
            return $this->name_ar;
    }

    public function getDashImageAttribute()
    {
        $attribute = "";
        if ($this->image)
            $attribute = $this->image;
        return $attribute;
    }

    public function getDashCreatedAttribute()
    {
        $attribute = "";
        if ($this->created_at)
            $attribute = $this->created_at->format('Y-m-d');
        return $attribute;
    }

    public function sub_categories()
    {
        return $this->hasMany('App\SubCategory');
    }
}
