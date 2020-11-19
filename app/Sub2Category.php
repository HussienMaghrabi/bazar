<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sub2Category extends Model
{
    //

    protected $guarded = [];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['name'] = $this->serv_name;
        $data['image'] = $this->serv_images;
        $data['has_subcategory'] = $this->serv_has_subcategory;
        $data['next'] = $this->serv_next;
        return $data;
    }

    public function getServNextAttribute()
    {
        $attribute = "";
        if ($this->serv_has_subcategory == true)  {
            $attribute =  3;
        } else {
            $attribute = 0;
        }
        return $attribute;
    }
    
     public function getImageAttribute($value)
    {
        if ($value)
        {
            return asset(Storage::url($value));
        }
    }


    public function getServHasSubcategoryAttribute()
    {
        $attribute = "";
        if (count($this->sub3_category) > 0) {
            $attribute = true;
        } else {
            $attribute = false;
        }
        return $attribute;
    }

    public function getServImagesAttribute()
    {
       $attribute = [
           
            "id"=> $this->id ,
            "image"=> $this->image
           
            ];
       
        return $attribute;
    }

    
    public function getServOneImageAttribute()
    {
        $attribute = "";
        if ($this->Sub2CategoryImage){
            $attribute = Sub2CategoryImage::where('sub_id',$this->id)->first();
            if($attribute){
                $attribute = $attribute->serv_image;
            }else{
                $attribute = asset('assets/admin/images/logo.png');
            }
        }else{
            $attribute = asset('assets/admin/images/logo.png');
        }
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

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function sub_category(){
        return $this->belongsTo('App\SubCategory', 'sub_category_id');
    }

    public function sub3_category(){
        return $this->hasMany('App\Sub3Category');
    }



   
    public function Sub2CategoryImage()
    {
        return $this->hasMany(Sub2CategoryImage::class, 'sub_id');
    }

}
