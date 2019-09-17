<?php

namespace App\Http\Controllers\Api\UserAuth;

use App\Http\Resources\UserAuth\UserRegisterResource;
use App\ModulesConst\UserOnlineStatus;
use App\ModulesConst\UserTyps;
use App\Traits\apiResponse;
use App\Traits\storeImage;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    use apiResponse , storeImage;
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'image' => '',
        ]);

        // check if this email existed ..
        $EmailCheck = User::where('email', $request->email)->get();
        if ($EmailCheck->count() > 0) {
            return $this->apiResponse($request, trans('language.exist'), null, false);
        }
        $data = $request->all();
        $data['api_token'] = rand(99999999, 999999999) . time();
        $data["password"] = Hash::make($request->password);
        $data["user_type_id"] = UserTyps::user;
        $data["fire_base_token"] = $request->fire_base_token;
        if($request->image)
        {
           $data['image'] = $this->storeImage($request->image);
        }
        $user = User::create($data);
        auth()->login($user);
        $item= new UserRegisterResource($user);
        return $this->apiResponse($request, trans('language.message'), $item, true);
    }
}
