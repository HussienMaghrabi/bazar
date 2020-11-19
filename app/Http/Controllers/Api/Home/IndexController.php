<?php

    namespace App\Http\Controllers\Api\Home;

    use App\Adv_slider;
    use App\Category;
    use App\Slider;
    use App\Slider1;
    use App\Slider2;
    use App\Slider3;
    use App\Slider4;
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
            $slider3 = Slider1::all();
            $slider4 = Slider2::all();
            $slider5 = Slider3::all();
            $slider6 = Slider4::all();
            $categories = Category::orderBy('id', 'desc')->get();
            $data['slider1'] = $slider1;
            $data['slider2'] = $slider2;
            $data['slider3'] = $slider3;
            $data['slider4'] = $slider4;
            $data['slider5'] = $slider5;
            $data['slider6'] = $slider6;
            $data['categories'] = $categories;
            return $this->apiResponse($request, trans('language.message'), $data, true);
        }


        public function homePageSearch(Request $request)
        {

        }
    }
