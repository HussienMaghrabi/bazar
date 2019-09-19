<?php

namespace App\Http\Controllers\Api\User;

use App\Advertisement;
use App\Advertisement_favourite;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserFavouriteController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        $items = Advertisement_favourite::where('user_id',$user_id)->pluck('adv_id');
        $data = Advertisement::whereIn('id',$items)->get();
        return $this->apiResponse($request, trans('language.message'), $data, true);
    }
}
