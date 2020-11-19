<?php

namespace App\Http\Controllers\Api\Sub4Category;

use App\Sub4Category;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $request->validate([
            'sub3_category_id' => 'required|string',
        ]);
        $items = Sub4Category::orderBy('sort', 'DESC')->where('sub3_category_id',$request->sub3_category_id)->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }
}
