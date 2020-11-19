<?php

namespace App\Http\Controllers\Admin\Category;

use App\Category;
use App\Traits\storeImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    private $resources = 'categories';
    private $resource = [
        'route' => 'categories',
        'view' => "categories",
        'title' => "categories",
        'action' => "",
        'header' => "categories"
    ];
    use storeImage;
    public function index()
    {
        $items = Category::orderBy('sort', 'DESC')->paginate(10);
        $resource = $this->resource;
        return view('admin.categories.index', compact('items', 'resource'));
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
        return view('admin.'.$this->resources.'.create',compact( 'resource'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:2048',
        ]);
        if ($request->image) {
            $data['image'] = $this->storeImage($data['image']);
        }
        if ($request->sort <= '9') {
        $data['sort'] = "0".$request->sort;
        }else{
         $data['sort'] = $request->sort;
        }
        Category::create($data);
        session()->flash('success', trans('admin.done'));
        return redirect(url('/admin/categories'));
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
        $resource = $this->resource;
        $resource['action'] = 'Edit';
        $item = Category::findOrFail($id);
        return view('admin.categories.edit', compact('item', 'resource'));
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

        $item = Category::findOrFail($id);
        $data = $request->validate([
            'name_ar' => '',
            'name_en' => '',
            'sort' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        if ($request->image) {
            $data['image'] = $this->storeImage($data['image']);
        }
        $item->update($data);
        session()->flash('success', trans('admin.done'));
        return redirect(url('/admin/categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::findOrFail($id);
        $item->delete();
        session()->flash('success', trans('admin.DeleteItem'));
        return redirect(url('/admin/categories'));
    }

}
