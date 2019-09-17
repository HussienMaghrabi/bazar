<?php

namespace App\Http\Controllers\Admin\IttoSectionType;

use App\Itto_sections;
use App\Itto_sections_type;
use App\Traits\storeImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Itto_sections_type::orderBy('id', 'desc')->paginate(10);
        return view('admin.ittos_sections_types.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ittos_sections_types.create');
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
        ]);

        Itto_sections_type::create($data);
        return redirect(url('/admin/ittos_sections_types'));
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
        $item = Itto_sections_type::findOrFail($id);
        return view('admin.ittos_sections_types.edit', compact('item'));
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

        $item = Itto_sections_type::findOrFail($id);
        $data = $request->validate([
            'name_ar' => '',
            'name_en' => '',
        ]);

        $item->update($data);
        return redirect(url('/admin/ittos_sections_types'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Itto_sections_type::findOrFail($id)->delete();
        return redirect(url('/admin/ittos_sections_types'));
    }
}
