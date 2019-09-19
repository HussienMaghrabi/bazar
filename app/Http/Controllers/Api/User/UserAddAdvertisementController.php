<?php

namespace App\Http\Controllers\Api\User;

use App\Advertisement;
use App\Advertisement_images;
use App\Traits\apiResponse;
use App\Traits\storeImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAddAdvertisementController extends Controller
{
    use apiResponse , storeImage;
    public function index(Request $request)
    {
        $data = $request->validate([
            'image' => '',
            'title' => 'required',
            'category_id' => 'required',
            'sub_category_id' => '',
            'description' => 'required',
            'price' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
        ]);

        $data['user_id'] = $request->user()->id;
        $adv = Advertisement::create($data);
        $this->AdvertisementImagesHandler($request, $adv);
        return $this->apiResponse($request, trans('language.message'), $adv->singleObject(), true);
    }

    public function AdvertisementImagesHandler($request, $adv)
    {

        $info["adv_id"] = $adv->id;
        if($request->image)
        {
            foreach($request->image as $image)
            {
                $info["image"] = $this->storeImage($image);
                Advertisement_images::create($info);
            }
        }

    }

}
