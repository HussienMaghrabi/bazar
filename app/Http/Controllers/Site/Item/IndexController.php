<?php

namespace App\Http\Controllers\Site\Item;

use App\Advertisement;
use App\Slider;
use App\Slider2;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index($id)
    {
        $items = Advertisement::where("sub4_category_id", $id)->get();
        $sliders = Slider::inRandomOrder()->take(5)->get();
        return view("site.items.index", compact("items", "sliders"));
    }
    public function details($id){
        $item = Advertisement::find($id);
        return view("site.items.details", compact("item"));
    }
}
