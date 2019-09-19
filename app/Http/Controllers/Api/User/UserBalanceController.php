<?php

namespace App\Http\Controllers\Api\User;

use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserBalanceController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $item = $request->user();
        $data['id'] = $item->id;
        $data['api_toke'] = $item->api_token;
        $data['balance'] = $item->serv_balance;
        $data['adv_limit'] = $item->serv_adv_limit;
        return $this->apiResponse($request, trans('language.message'), $data, true);

    }
}
