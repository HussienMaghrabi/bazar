<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub4Category extends Model
{
    //
    protected $guarded = [];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['name'] = $this->serv_name;
        $data['image'] = $this->serv_images;
        $data['next'] = 0 ;
        return $data;
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
        if ($this->Sub4CategoryImage){
            $attribute = Sub4CategoryImage::where('sub_id',$this->id)->first();
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
    
     public function getImageAttribute($value)
    {
        if ($value)
        {
            return asset(Storage::url($value));
        }
    }


    public function getServNameAttribute()
    {
        if (\request()->lang == "en")
            return $this->name_en;
        else
            return $this->name_ar;
    }


     public function getDashImageAttribute()
    {
        $attribute = "";
        if ($this->Sub4CategoryImage){
            $attribute = Sub4CategoryImage::where('sub_id',$this->id)->first();
            if($attribute){
                $attribute = $attribute->image;
            }else{
                $attribute = asset('assets/admin/images/logo.png');
            }
        }else{
            $attribute = asset('assets/admin/images/logo.png');
        }
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
        return $this->belongsTo('App\Category');
    }
    public function sub_category(){
        return $this->belongsTo('App\SubCategory');
    }
    public function sub2_category(){
        return $this->belongsTo('App\Sub2Category');
    }
    public function sub3_category(){
        return $this->belongsTo('App\Sub3Category');
    }

    public function Sub4CategoryImage()
    {
        return $this->hasMany(Sub4CategoryImage::class, 'sub_id');
    }
}
