<?php

namespace App\Http\Controllers\Admin\IttoSection;

use App\Itto;
use App\Itto_sections;
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
        $items = Itto_sections::orderBy('id', 'desc')->paginate(10);
        return view('admin.ittos_sections.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ittos_sections.create');
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
            'itto_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:2048',
        ]);

        if ($data['image']) {
            $data['image'] = $this->storeImage($data['image']);
        }
        Itto_sections::create($data);
        return redirect(url('/admin/ittos_sections'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Itto_sections::findOrFail($id);
        return view('admin.ittos_sections.edit', compact('item'));
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

        $item = Itto_sections::findOrFail($id);
        $data = $request->validate([
            'name_ar' => '',
            'name_en' => '',
            'itto_id' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        if ($request['image']) {
            $data['image'] = $this->storeImage($data['image']);
        }
        $item->update($data);
        return redirect(url('/admin/ittos_sections'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Itto_sections::findOrFail($id)->delete();
        return redirect(url('/admin/ittos_sections'));
    }
}
