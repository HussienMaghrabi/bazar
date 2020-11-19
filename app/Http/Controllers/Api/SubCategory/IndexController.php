<?php

namespace App\Http\Controllers\Api\SubCategory;

use App\Sub2Category;
use App\Sub2CategoryImage;
use App\Sub3Category;
use App\Sub3CategoryImage;
use App\Sub4Category;
use App\Sub4CategoryImage;
use App\SubCategory;
use App\SubCategoryImage;
use App\Http\Traits\apiResponsed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponsed;
    public function index(Request $request)
    {
        $request->validate([
            'category_id' => '',
            'from' => '',
        ]);
        if($request->from == 1){
            $items = SubCategory::orderBy('sort', 'DESC')->where('category_id',$request->category_id)->get();
            $slider = SubCategoryImage::get();
            return $this->apiResponsed($request,__('language.message') ,$items ,$slider,true);
        }elseif ($request->from == 2){
            $items = Sub2Category::orderBy('sort', 'DESC')->where('sub_category_id',$request->category_id)->get();
            $slider = Sub2CategoryImage::get();
            return $this->apiResponsed($request,__('language.message') ,$items ,$slider ,true);
        }elseif ($request->from == 3){
            $items = Sub3Category::orderBy('sort', 'DESC')->where('sub2_category_id',$request->category_id)->get();
            $slider = Sub3CategoryImage::get();
            return $this->apiResponsed($request,__('language.message') ,$items ,$slider ,true);
        }elseif ($request->from == 4 ){
            $items = Sub4Category::orderBy('sort', 'DESC')->where('sub3_category_id',$request->category_id)->get();
            $slider = Sub4CategoryImage::get();
            return $this->apiResponsed($request,__('language.message') ,$items ,$slider ,true);
        }else{
            return $this->apiResponsed(null,__('language.message') ,null ,null ,false);
        }
    }
}
