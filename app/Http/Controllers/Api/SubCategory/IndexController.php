<?php

namespace App\Http\Controllers\Api\SubCategory;

use App\SubCategory;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $request->validate([
            'category_id' => 'required|string',
        ]);
        $items = SubCategory::where('category_id',$request->category_id)->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }
}
