<?php

    namespace App\Http\Controllers\Site\Category;

    use App\Advertisement;
    use App\Category;
    use App\Slider;
    use App\Slider2;
    use App\SubCategory;
    use App\Sub2Category;
    use App\Sub3Category;
    use App\Sub4Category;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {

        public function index(Request $request)
        {
            $items = Category::orderBy('id', 'desc')->get();
            $sliders = Slider::inRandomOrder()->take(5)->get();
            $subcategory = App\SubCategory::where('id',$items->id)->count();
            return view("site.views.category.index",compact("items" ,"sliders",'subcategory'));
        }

        public function subcategories($id)
        {
            $items = SubCategory::where("category_id", $id)->get();
            $sliders = Slider::inRandomOrder()->take(5)->get();
            return view("site.category.subcats", compact("items", "sliders"));
        }

        public function sub2categories($id)
        {
            $items = Sub2Category::where("sub_category_id", $id)->get();
            return view("site.category.sub2cats", compact("items"));
        }

        public function sub3categories($id)
        {
            $items = Sub3Category::where("sub2_category_id", $id)->get();
            return view("site.category.sub3cats", compact("items"));
        }

        public function sub4categories($id)
        {
            $items = Sub4Category::where("sub3_category_id", $id)->get();
            return view("site.category.sub4cats", compact("items"));
        }
    }
