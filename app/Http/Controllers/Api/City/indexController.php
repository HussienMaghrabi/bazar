<?php

namespace App\Http\Controllers\Api\City;

use App\City;
use App\Country;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    use apiResponse;


    public function index(Request $request)
    {
        $request->validate([
            'country_id' => 'required|string',
        ]);

        $items = City::where('country_id',$request->country_id)->get();
        return $this->apiResponse($request, trans('language.message'), $items, true);

    }
}
