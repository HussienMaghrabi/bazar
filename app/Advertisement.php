<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Advertisement extends Model
{
    protected $guarded = [];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['user_name'] = $this->serv_user_name;
        $data['user_image'] = $this->serv_user_image;
        $data['title'] = $this->serv_title;
        $data['price'] = $this->serv_price;
        $data['mobile'] = $this->mobile;
        $data['category_name'] = $this->serv_category_name;
        $data['description'] = $this->serv_description;
        $data['post_on'] = $this->serv_post_on;
        $data['is_favourite'] = $this->getServIsFavouriteAttribute();
        $data['images'] = $this->serv_images;
        return $data;
    }


    public function singleObject()
    {
        $data['id'] = $this->id;
        $data['user_name'] = $this->serv_user_name;
        $data['user_image'] = $this->serv_user_image;
        $data['title'] = $this->serv_title;
        $data['price'] = $this->serv_price;
        $data['mobile'] = $this->serv_mobile;
        $data['category_name'] = $this->serv_category_name;
        $data['description'] = $this->serv_description;
        $data['post_on'] = $this->serv_post_on;
        $data['is_favourite'] = $this->getServIsFavouriteAttribute();
        $data['images'] = $this->serv_images;
        return $data;
    }

    public function getServIsFavouriteAttribute()
    {

        if (\request()->api_token) {
            $user = User::where('api_token', \request()->api_token)->first();
            $checkFav =
                Advertisement_favourite::where('user_id', $user->id)
                    ->where('adv_id', $this->id)->first();
            if ($checkFav) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public function getServPostOnAttribute()
    {
        $attribute = "";
        if ($this->created_at)
            $attribute = strtotime($this->created_at) * 1000;
        return $attribute;
    }
    
     public function getServMobileAttribute()
    {
        $attribute = "";
        $code = "+965" ;
        if ($this->mobile)
            $attribute = $code.$this->mobile;
        return $attribute;
    }

    public function getServDescriptionAttribute()
    {
        $attribute = "";
        if ($this->description)
            $attribute = $this->description;
        return $attribute;
    }

    public function getServImagesAttribute()
    {
        $attribute = "";
        if ($this->Advertisement_images)
            $attribute = $this->Advertisement_images;
        return $attribute;
    }

    public function getServOneImageAttribute()
    {
        $attribute = "";
        if ($this->Advertisement_images){
            $attribute = Advertisement_images::where('adv_id',$this->id)->first();
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

    public function getServTitleAttribute()
    {
        $attribute = "";
        if ($this->title)
            $attribute = $this->title;
        return $attribute;
    }

    public function getServPriceAttribute()
    {
        $attribute = "";
        if ($this->price)
            $attribute = $this->price;
        return $attribute;
    }

    public function getServUserNameAttribute()
    {
        $attribute = "";
        if ($this->user)
            $attribute = $this->user->serv_name;
        return $attribute;
    }

    public function getServUserImageAttribute()
    {
        $attribute = "";
        if ($this->user)
            $attribute = $this->user->serv_image;
        return $attribute;
    }

    public function getServCityNameAttribute()
    {
        $attribute = "";
        if ($this->city)
            $attribute = $this->city->serv_name;
        return $attribute;
    }

    public function getServCountryNameAttribute()
    {
        $attribute = "";
        if ($this->country)
            $attribute = $this->country->serv_name;
        return $attribute;
    }


    public function getServCategoryNameAttribute()
    {
        $attribute = "";
        if ($this->category)
            $attribute = $this->category->serv_name;
        return $attribute;
    }

    //Dashboard
    public function getDashNameAttribute()
    {
        $attribute = "";
        if ($this->title)
            $attribute = $this->title;
        return $attribute;
    }

    public function getDashPriceAttribute()
    {
        $attribute = "";
        if ($this->price)
            $attribute = $this->price;
        return $attribute;
    }


    public function getDashDescriptionAttribute()
    {
        $attribute = "";
        if ($this->description)
            $attribute = $this->description;
        return $attribute;
    }

    public function getDashCategoryNameAttribute()
    {
        $attribute = "";
        if ($this->category)
            $attribute = $this->category->dash_name;
        return $attribute;
    }

    public function getDashCountryNameAttribute()
    {
        $attribute = "";
        if ($this->Country)
            $attribute = $this->Country->dash_name;
        return $attribute;
    }

    public function getDashCityNameAttribute()
    {
        $attribute = "";
        if ($this->city)
            $attribute = $this->city->dash_name;
        return $attribute;
    }

    public function getDashCreatedAttribute()
    {
        $attribute = "";
        if ($this->created_at)
            $attribute = $this->created_at->format('Y-m-d');
        return $attribute;
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    public function Advertisement_images()
    {
        return $this->hasMany(Advertisement_images::class, 'adv_id');
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
    public function sub4_category(){
        return $this->belongsTo('App\Sub4Category');
    }
}
