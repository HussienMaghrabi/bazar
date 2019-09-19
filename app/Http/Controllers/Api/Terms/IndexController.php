<?php

namespace App\Http\Controllers\Api\Terms;

use App\Terme;
use App\Terms;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;

    public function index(Request $request)
    {
        $termeApp = Terms::where('id',1)->get();
        return $this->apiResponse($request, trans('language.message'), $termeApp, true);

    }
}
