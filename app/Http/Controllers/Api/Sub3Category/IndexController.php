<?php

namespace App\Http\Controllers\Api\Sub3Category;

use App\Sub3Category;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $request->validate([
            'sub2_category_id' => 'required|string',
        ]);
        $items = Sub3Category::orderBy('sort', 'DESC')->where('sub2_category_id',$request->sub2_category_id)->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }
}
