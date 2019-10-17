<?php

namespace App\Http\Controllers\Api\Notification;

use App\Traits\apiResponse;
use App\User_notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $userid = $request->user()->id;
        if (!$userid)
            abort(404);
        $data = User_notification::where('user_id', $userid)->orderBy('id', 'desc')->get();
        return $this->apiResponse($request, trans('language.message'), $data, true);;
    }
}
