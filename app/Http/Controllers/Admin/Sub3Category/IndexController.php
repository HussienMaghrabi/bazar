<?php

namespace App\Http\Controllers\Admin\Sub3Category;

use App\Category;
use App\SubCategory;
use App\Sub2Category;
use App\Sub3Category;
use App\Sub3CategoryImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Validator;

class IndexController extends Controller
{
    private $resources = 'sub3categories';
    private $resource = [
        'route' => 'sub3categories',
        'view' => "sub3categories",
        'title' => "sub3categories",
        'action' => "",
        'header' => "sub3categories"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Sub3Category::orderBy('sort', 'desc')->paginate(10);
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
        $category = Category::select("name_$lang as name", 'id')->get();
        $subcategories = SubCategory::select("name_$lang as name", 'id')->get();

        return view('admin.'.$this->resources.'.create',compact( 'resource', 'subcategories','category'))->render();

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
            
        $item = Sub3Category::create($inputs);

        if ($request->images)
            foreach ($request->images as $image) {
                Sub3CategoryImage::create([
                    'image' => $this->store_Image($image),
                    'sub_id' => $item->id
                ]);
            }
        
        return redirect(url('/admin/sub3categories'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Sub3Category  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sub3Category  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $lang = App::getLocale() ;
        $resource = $this->resource;
        $resource['action'] = 'Edit';
        $item = Sub3Category::findOrFail($id);
        $category = Category::select("name_$lang as name", 'id')->get();
        $subcategories   = SubCategory::select("name_$lang as name", 'id')->where('category_id', $item->category_id)->get();

        return view('admin.'.$this->resources.'.edit', compact('item', 'resource', 'subcategories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sub3Category  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules =  [
            'name_ar'     => 'required',
            'name_en'     => 'required',
            'sub_category_id' => 'required',
            'sub2_category_id' => 'required',
            'sort' => '',
            'image'       => 'nullable|mimes:jpeg,jpg,png,gif',
        ];

        Validator::make($request->all(), $rules);

        $inputs = $request->except('image');
        $item = Sub3Category::findOrFail($id);
        if ($request->image)
        {
            if (strpos($item->image, '/images/') !== false) {
                $image = str_replace( asset('').'storage/', '', $item->image);
                Storage::disk('public')->delete($image);
            }
            $inputs['image'] =$this->store_Image($request->image);
        }

        Sub3Category::find($id)->update($inputs);
        session()->flash('success', trans('admin.done'));
        return redirect(url('/admin/sub3categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sub3Category  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $item = Sub3Category::findOrFail($id);
        if (strpos($item->image, '/images/') !== false) {
            $image = str_replace( asset('').'storage/', '', $item->image);
            Storage::disk('public')->delete($image);
        }
        $item->delete();
        session()->flash('success', trans('admin.DeleteItem'));
        return redirect(url('/admin/sub3categories'));
    }


}
