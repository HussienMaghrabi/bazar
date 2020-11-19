<?php

namespace App\Http\Controllers\Api\Sub2Category;

use App\Sub2Category;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $request->validate([
            'sub_category_id' => 'required|string',
        ]);
        $items = Sub2Category::orderBy('sort', 'DESC')->where('sub_category_id',$request->sub_category_id)->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }
}
