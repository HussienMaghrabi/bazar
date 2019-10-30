<?php

    namespace App\Http\Controllers\Api\Home;

    use App\Adv_slider;
    use App\Category;
    use App\Slider;
    use App\Traits\apiResponse;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {
        use apiResponse;

        public function index(Request $request)
        {
            $slider1 = Slider::all();
            $slider2 = Adv_slider::all();
            $categories = Category::orderBy('id', 'desc')->get();
            $data['slider1'] = $slider1;
            $data['slider2'] = $slider2;
            $data['categories'] = $categories;
            return $this->apiResponse($request, trans('language.message'), $data, true);
        }
    }
