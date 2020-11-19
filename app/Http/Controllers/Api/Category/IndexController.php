<?php

namespace App\Http\Controllers\Api\Category;

use App\Category;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {

        $items = Category::orderBy('sort', 'DESC')->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }
}
