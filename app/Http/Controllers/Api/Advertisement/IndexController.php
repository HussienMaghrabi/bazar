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
            'subCategory_id' => '',
        ]);

            if ($request->subCategory_id != null) {
                $items = Advertisement::where('country_id', $request->country_id)
                    ->where('subCategory_id', $request->subCategory_id)->get();
            } else {
                $items = Advertisement::where('country_id', $request->country_id)
                    ->where('category_id', $request->category_id)->get();
            }

        return $this->apiResponse($request, trans('language.message'), $items, true);
    }

    public function City_advertisements(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'city_id' => 'required',
            'subCategory_id' => '',
        ]);

        if ($request->subCategory_id != null) {
            $items = Advertisement::where('city_id', $request->city_id)
                ->where('subCategory_id', $request->subCategory_id)->get();
        } else {
            $items = Advertisement::where('city_id', $request->city_id)
                ->where('category_id', $request->category_id)->get();
        }

        return $this->apiResponse($request, trans('language.message'), $items, true);
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
