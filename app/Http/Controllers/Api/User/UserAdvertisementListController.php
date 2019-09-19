<?php

namespace App\Http\Controllers\Api\User;

use App\Advertisement;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAdvertisementListController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $items = Advertisement::where('user_id',$request->user()->id)->get();
        return $this->apiResponse($request, trans('language.message'), $items, true);

    }
}
