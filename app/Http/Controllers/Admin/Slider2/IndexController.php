<?php

namespace App\Http\Controllers\Admin\Slider2;

use App\Slider2;
use App\MainCategory;
use App\Traits\storeImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use storeImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Slider2::orderBy('id', 'desc')->paginate(10);
        return view('admin.sliders2.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders2.create');
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
            'link' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:2048',
        ]);
        if ($data['image']) {
            $data['image'] = $this->storeImage($data['image']);
        }
        Slider2::create($data);
        return redirect(url('/admin/sliders2'));
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

        $item = Slider2::findOrFail($id);
        return view('admin.sliders2.edit', compact('item'));
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
        $item = Slider2::findOrFail($id);
        $data = $request->validate([
            'link' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        if ($request->image) {
            $data['image'] = $this->storeImage($data['image']);
        }
        $item->update($data);
        return redirect(url('/admin/sliders2'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Slider2::findOrFail($id)->delete();
        return redirect(url('/admin/sliders2'));
    }
}
