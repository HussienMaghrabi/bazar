<?php

namespace App\Http\Controllers\Admin\SubCategory;

use App\Category;
use App\SubCategory;
use App\SubCategoryImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Validator;

class IndexController extends Controller
{
    private $resources = 'subcategories';
    private $resource = [
        'route' => 'subcategories',
        'view' => "subcategories",
        'title' => "subcategories",
        'action' => "",
        'header' => "SubCategories"
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = SubCategory::orderBy('sort', 'desc')->paginate(10);
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
        $resource = $this->resource;
        $resource['action'] = 'Create';
        $categories = Category::pluck('name_'.App::getLocale(), 'id')->all();

        return view('admin.'.$this->resources.'.create',compact( 'resource', 'categories'));

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
            Validator::make($request->all(), $rules);

            $inputs = $request->except('image', 'images');
            if ($request->sort <= '9') {
                $inputs['sort'] = "0".$request->sort;
            }else{
                $inputs['sort'] = $request->sort;
            }
            
             if($request->image)
            {
                $inputs['image'] =$this->store_Image($request->image);
            }
            
            $item = SubCategory::create($inputs);
            
            if ($request->images)
                foreach ($request->images as $image) {
                    SubCategoryImage::create([
                        'image' => $this->store_Image($image),
                        'sub_id' => $item->id
                    ]);
                }

            session()->flash('success', __('language.done'));
            return redirect(url('/admin/subcategories'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $resource = $this->resource;
        $resource['action'] = 'Edit';
        $item = SubCategory::findOrFail($id);
        $categories = Category::pluck('name_'.App::getLocale(), 'id')->all();
        return view('admin.'.$this->resources.'.edit', compact('item', 'resource', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $rules =  [
            'category_id' => 'required',
            'name_ar'     => 'required',
            'name_en'     => 'required',
            'sort'        => '',
            'image'       => 'nullable|mimes:jpeg,jpg,png,gif',
        ];

        Validator::make($request->all(), $rules);

        $inputs = $request->except('image');
        $item = SubCategory::findOrFail($id);
        if ($request->image)
        {
            if (strpos($item->image, '/images/') !== false) {
                $image = str_replace( asset('').'storage/', '', $item->image);
                Storage::disk('public')->delete($image);
            }
            $inputs['image'] =$this->store_Image($request->image);
        }

        SubCategory::find($id)->update($inputs);
        session()->flash('success',  __('language.done'));
        return redirect(url('/admin/subcategories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $lang = request()->header('lang');
        $item = SubCategory::findOrFail($id);
        if (strpos($item->image, '/images/') !== false) {
            $image = str_replace( asset('').'storage/', '', $item->image);
            Storage::disk('public')->delete($image);
        }
        $item->delete();
        session()->flash('success', __('language.DeleteItem'));
        return redirect(url('/admin/subcategories'));
    }


}
