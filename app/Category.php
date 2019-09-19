<?php

namespace App;

use App\ModulesConst\CategoryIsSaleAndRent;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'image',
    ];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['name'] = $this->serv_name;
        $data['image'] = $this->serv_image;
        $data['has_subcategory'] = $this->serv_has_subcategory;
        return $data;
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

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
}
