<?php

namespace App\Http\Controllers\Admin\Sub2Category;

use App\Category;
use App\SubCategory;
use App\Sub2Category;
use App\Sub2CategoryImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Validator;

class IndexController extends Controller
{
    private $resources = 'sub2categories';
    private $resource = [
        'route' => 'sub2categories',
        'view' => "sub2categories",
        'title' => "sub2categories",
        'action' => "",
        'header' => "Sub2Categories"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Sub2Category::orderBy('sort', 'desc')->paginate(10);
        $resource = $this->resource;
        return view('admin.'.$this->resources.'.index',compact('items', 'resource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = App::getLocale() ;
        $resource = $this->resource;
        $resource['action'] = 'Create';
        $categories = Category::select("name_$lang as name", 'id')->get();
        $subcategories = SubCategory::select("name_$lang as name", 'id')->where('category_id', request('category_id'))->get();

        return view('admin.'.$this->resources.'.create',compact( 'resource', 'subcategories','categories'))->render();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
        $rules =  [
            'sub_category_id'  => 'nullable',
            'name_ar'          => 'required',
            'name_en'          => 'required',
            'images'           => 'required',


        ];
        $validator = Validator::make($request->all(), $rules);
       
         $inputs = $request->except( 'image','images');
        if ($request->sort <= '9') {
            $inputs['sort'] = "0".$request->sort;
        }else{
            $inputs['sort'] = $request->sort;
        }
        
        if($request->image)
            {
                $inputs['image'] =$this->store_Image($request->image);
            }
            
        $item = Sub2Category::create($inputs);
        
        if ($request->images)
                foreach ($request->images as $image) {
                    Sub2CategoryImage::create([
                        'image' => $this->store_Image($image),
                        'sub_id' => $item->id
                    ]);
                    
        
        return redirect(url('/admin/sub2categories'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sub2Category  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sub2Category  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $lang = App::getLocale() ;
        $resource = $this->resource;
        $resource['action'] = 'Edit';
        $item = Sub2Category::findOrFail($id);
        $categories = Category::select("name_$lang as name", 'id')->get();
        $subcategories   = SubCategory::select("name_$lang as name", 'id')->where('category_id', $item->category_id)->get();

        return view('admin.'.$this->resources.'.edit', compact('item', 'resource', 'subcategories','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sub2Category  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules =  [
            'sub_category_id' => 'required',
            'name_ar'     => 'required',
            'name_en'     => 'required',
            'sort'        => '',
            'image'       => 'nullable|mimes:jpeg,jpg,png,gif',
        ];

        Validator::make($request->all(), $rules);

        $inputs = $request->except('image');
        $item = Sub2Category::findOrFail($id);
        if ($request->image)
        {
            if (strpos($item->image, '/images/') !== false) {
                $image = str_replace( asset('').'storage/', '', $item->image);
                Storage::disk('public')->delete($image);
            }
            $inputs['image'] =$this->store_Image($request->image);
        }

        Sub2Category::find($id)->update($inputs);
        session()->flash('success', trans('admin.done'));
        return redirect(url('/admin/sub2categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sub2Category  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $item = Sub2Category::findOrFail($id);
        if (strpos($item->image, '/images/') !== false) {
            $image = str_replace( asset('').'storage/', '', $item->image);
            Storage::disk('public')->delete($image);
        }
        $item->delete();
        session()->flash('success', trans('admin.DeleteItem'));
        return redirect(url('/admin/sub2categories'));
    }

    public function ajax()
    {
        $lang = App::getLocale() ;
        $subcategories = SubCategory::select("name_$lang as name", 'id')->where('category_id', request('category_id'))->get();
        return view('admin.sub2categories.sub', compact('subcategories'))->render();
    }
}
