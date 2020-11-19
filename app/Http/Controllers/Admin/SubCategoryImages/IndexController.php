<?php

namespace App\Http\Controllers\Admin\SubCategoryImages;

use App\SubCategory;
use App\SubCategoryImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Validator;

class IndexController extends Controller
{
    private $resources = 'subcategoryimage';
    private $resource = [
        'route' => 'subcategoryimage',
        'view' => "subcategoryimage",
        'title' => "subcategoryimage",
        'action' => "",
        'header' => "SubCategoryImage"
    ];
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($value)
    {
      
        $data = SubCategoryImage::where('sub_id', $value)->paginate(10);
        $resource = $this->resource;
        return view('admin.'.$this->resources.'.index',compact('data', 'resource', 'value'));
    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang, $value)
    {
        App::setLocale($lang);
        $resource = $this->resource;
        $resource['action'] = 'Create';
        return view('admin.'.$this->resources.'.create',compact( 'resource', 'value'));

    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request, $value)
    {
        $rules =  [
            'image' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return back();
        }

         $inputs=$this->store_Image($request->image);

        ProductImage::create(['image'=>$inputs,'sub_id'=>$value]);

         session()->flash('success', __('language.done'));
        return redirect()->route($this->resource['route'].'.index', [ $value]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($value, $id)
    {
        $resource = $this->resource;
        $resource['action'] = 'Edit';
        $item = SubCategoryImage::findOrFail($id);
        return view('admin.' .$this->resources. '.edit', compact('item', 'resource', 'value'));
    }
    
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $value, $id)
    {
        $rules =  [
            'image' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return back();
        }
        
        $item = SubCategoryImage::find($id);
        $inputs = $request->except('image');
        
        if (strpos($item->image, '/images/') !== false) {
            $image = str_replace( asset('').'storage/', '', $item->image);
            Storage::disk('public')->delete($image);
        }
        
        $inputs['image'] =$this->store_Image($request->image);

        $item->update($inputs);
        session()->flash('success', __('language.done'));
        return redirect()->route($this->resource['route'].'.index', [ $value]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
     public function destroy( $value, $id)
    {
        $item = SubCategoryImage::findOrFail($id);
        
        if (strpos($item->image, '/images/') !== false) {
            $image = str_replace( asset('').'storage/', '', $item->image);
            Storage::disk('public')->delete($image);
        }
        
        $item->delete();
        return redirect()->route($this->resource['route'].'.index', [ $value]);
    }
    
    
    
}