<?php

namespace App\Http\Controllers\Api\UserAuth;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\UserAuth\UserLoginResource;
use App\ModulesConst\UserOnlineStatus;
use App\ModulesConst\UserTyps;
use App\Traits\apiResponse;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;


class LoginController extends Controller
{
    use apiResponse;

    public function index(Request $request)
    {
        $data = $this->validation($request);
        $user = auth()->attempt(["email" => $data["email"] ,"password" => $data["password"] , 'user_type_id'=>UserTyps::user]);
        if (!$user)
            return $this->apiResponse($request, trans('auth.failed'), null, false);
        $newData["fire_base_token"] = $request->fire_base_token;
        $this->updateData($newData);
        return $this->response($request);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function validation(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        return $data;
    }

    /**
     * @param $newData
     */
    public function updateData($newData)
    {
        auth()->user()->update($newData);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function response(Request $request)
    {
        $item = new UserLoginResource(auth()->user());
        return $this->apiResponse($request, trans('language.login'), $item, true);
    }

    public function loginBySocialMedia(Request $request)
    {
        $request->validate([
            'social_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);
        $user = User::where('social_id', $request->social_id)->first();
        if ($user) {

            $EmailCheck = User::where('email', $request->email)->where('social_id',$request->social_id)->get();
            if (!$EmailCheck->count() > 0) {
                return $this->apiResponse($request, trans('language.exist'), null, false);
            }

            $user->fire_base_token = $request->fire_base_token;
            $user->save();
            return $this->apiResponse($request, trans('language.message'), new UserLoginResource($user), true);
        } else {

            $EmailCheck = User::where('email', $request->email)->get();
            if ($EmailCheck->count() > 0) {
                return $this->apiResponse($request, trans('language.exist'), null, false);
            }

            $data['api_token'] = rand(99999999, 999999999) . time();
            $data["user_type_id"] = UserTyps::user;
            $data['social_id'] = $request->social_id;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['fire_base_token'] = $request->fire_base_token;
            $user = User::create($data);
            $user = User::find($user->id);
            $item = new UserLoginResource($user);
            return $this->apiResponse($request, trans('language.message'), $item, true);
        }
    }

}
