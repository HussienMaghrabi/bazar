<?php

namespace App\Http\Controllers\Api\Advertisement;

use App\Advertisement;
use App\Advertisement_favourite;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;

    public function Country_advertisements(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'country_id' => 'required',
            'from' => '',
        ]);


        if($request->from == 1){
            $items = Advertisement::orderBy('sort', 'DESC')->where('country_id', $request->country_id)->where('sub_category_id',$request->category_id)->get();
            return $this->apiResponse($request,__('language.message') ,$items,true);
        }elseif ($request->from == 2){
            $items = Advertisement::orderBy('sort', 'DESC')->where('country_id', $request->country_id)->where('sub2_category_id',$request->category_id)->get();
            return $this->apiResponse($request,__('language.message') ,$items,true);
        }elseif ($request->from == 3){
            $items = Advertisement::orderBy('sort', 'DESC')->where('country_id', $request->country_id)->where('sub3_category_id',$request->category_id)->get();
            return $this->apiResponse($request,__('language.message') ,$items,true);
        }elseif ($request->from == 4 ){
            $items = Advertisement::orderBy('sort', 'DESC')->where('country_id', $request->country_id)->where('sub4_category_id',$request->category_id)->get();
            return $this->apiResponse($request,__('language.message') ,$items,true);
        }else{
            return $this->apiResponse(null,__('language.message') ,null,false);
        }
    }

    public function City_advertisements(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'city_id' => 'required',
            'from' => '',
        ]);

       if($request->from == 1){
            $items = Advertisement::orderBy('sort', 'DESC')->where('city_id', $request->city_id)->where('sub_category_id',$request->category_id)->get();
            return $this->apiResponse($request,__('language.message') ,$items,true);
        }elseif ($request->from == 2){
            $items = Advertisement::orderBy('sort', 'DESC')->where('city_id', $request->city_id)->where('sub2_category_id',$request->category_id)->get();
            return $this->apiResponse($request,__('language.message') ,$items,true);
        }elseif ($request->from == 3){
            $items = Advertisement::orderBy('sort', 'DESC')->where('city_id', $request->city_id)->where('sub3_category_id',$request->category_id)->get();
            return $this->apiResponse($request,__('language.message') ,$items,true);
        }elseif ($request->from == 4 ){
            $items = Advertisement::orderBy('sort', 'DESC')->where('city_id', $request->city_id)->where('sub4_category_id',$request->category_id)->get();
            return $this->apiResponse($request,__('language.message') ,$items,true);
        }else{
            return $this->apiResponse(null,__('language.message') ,null,false);
        }
    }

    public function single_advertisement(Request $request)
    {
        $request->validate([
            'advertisement_id' => 'required',
        ]);

        $item = Advertisement::findOrFail($request->advertisement_id);
        $item = $item->singleObject();
        return $this->apiResponse($request, trans('language.message'), $item, true);
    }
    public function add_adv_favourite(Request $request)
    {
        $request->validate([
            'advertisement_id' => 'required',
        ]);
        $item = Advertisement::findOrFail($request->advertisement_id);
        //check if old fav
        $check = Advertisement_favourite::where('user_id',$request->user()->id)->where('adv_id',$request->advertisement_id)->first();
        if($check)
        {
            return $this->apiResponse($request, trans('language.exist'), null, false);
        }
        $data['user_id'] = $request->user()->id;
        $data['adv_id'] = $item->id;
        Advertisement_favourite::create($data);
        return $this->apiResponse($request, trans('language.message'), null, true);
    }

    public function remove_adv_favourite(Request $request)
    {
        $request->validate([
            'advertisement_id' => 'required',
        ]);
        $item = Advertisement::findOrFail($request->advertisement_id);
        $check = Advertisement_favourite::where('user_id',$request->user()->id)->where('adv_id',$request->advertisement_id)->first();
        if(!$check)
        {
            return $this->apiResponse($request, trans('language.no_data'), null, false);
        }
        $check->delete();
        return $this->apiResponse($request, trans('language.message'), null, true);
    }
}
