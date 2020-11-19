<?php

    namespace App\Http\Controllers\Admin\Item;

    use App\Advertisement;
    use App\Category;
    use App\Country;
    use App\SubCategory;
    use App\Sub2Category;
    use App\Sub3Category;
    use App\Sub4Category;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Storage;
    use Validator;

    class IndexController extends Controller
    {

        private $resources = 'advertisements';
        private $resource = [
            'route' => 'advertisements',
            'view' => "advertisements",
            'title' => "advertisements",
            'action' => "",
            'header' => "advertisements"
        ];

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {

            $items = Advertisement::orderBy("sort", 'desc')->paginate(10);
            return view('admin.advertisements.index', compact('items'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
            $lang = App::getLocale() ;
            $resource = $this->resource;
            $resource['action'] = 'Create';
            $countries = Country::select("name_$lang as name", 'id')->get();
            $categories = Category::select("name_$lang as name", 'id')->get();
            $subcat = SubCategory::select("name_$lang as name", 'id')->get();

            return view('admin.'.$this->resources.'.create',compact( 'resource','countries','subcat','categories'))->render();

        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
            $rules =  [
                'title'         => 'required',
                'price'         => 'required',
                'description'   => 'required',
                'country_id'    => 'required',
               
            ];

            Validator::make($request->all(), $rules);
            $inputs = $request->all();
            $inputs['user_id'] = auth()->User()->id ;
             if ($request->sort <= '9') {
            $inputs['sort'] = "0".$request->sort;
            }else{
             $inputs['sort'] = $request->sort;
            }

            Advertisement::create($inputs);
            session()->flash('success', __('language.done'));
            return redirect(url('/admin/advertisements'));
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
            $lang = App::getLocale() ;
            $resource = $this->resource;
            $resource['action'] = 'Edit';
            $item = Advertisement::findOrFail($id);
            $countries = Country::select("name_$lang as name", 'id')->get();
            return view('admin.'.$this->resources.'.edit', compact('item','countries','resource'));

        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
            $rules =  [
                'title'         => 'required',
                'price'         => 'required',
                'description'   => 'required',
                'country_id'    => 'required',
                'sort'          => '',
            
            ];
            Validator::make($request->all(), $rules);
            $inputs = $request->all();
            Advertisement::find($id)->update($inputs);
            session()->flash('success', __('language.done'));
            return redirect(url('/admin/advertisements'));
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
            $item = Advertisement::findOrFail($id);
            $item->delete();
            session()->flash('success', __('language.DeleteItem'));
            return redirect(url('/admin/advertisements'));
        }



        public function ajax()
        {

            $lang = App::getLocale();
            if (request('category_id')) {
                $subcategory = SubCategory::select("name_$lang as name", 'id')->where('category_id', request('category_id'))->get();
                return view('admin.advertisements.sub', compact('subcategory'))->render();
            } elseif (request('sub_category')) {
                $sub2category = Sub2Category::select("name_$lang as name", 'id')->where('sub_category_id', request('sub_category'))->get();
                return  view('admin.advertisements.sub', compact('sub2category'))->render();
            } elseif(request('sub2_category')) {
                $sub3category = Sub3Category::select("name_$lang as name", 'id')->where('sub2_category_id', request('sub2_category'))->get();
                return view('admin.advertisements.sub', compact('sub3category'));
            }else {
                $sub4category = Sub4Category::select("name_$lang as name", 'id')->where('sub3_category_id', request('sub3_category'))->get();
                return view('admin.advertisements.sub', compact('sub4category'));
            }
        }
    }
