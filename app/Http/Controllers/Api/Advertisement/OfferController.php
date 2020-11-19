<?php

namespace App\Http\Controllers\Api\Advertisement;

use App\Advertisement;
use App\Advertisement_favourite;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $items = Advertisement::orderBy('sort', 'DESC')->where('is_offer',1)->get();
        return $this->apiResponse($request, trans('language.message'), $items, true);

    }
}
