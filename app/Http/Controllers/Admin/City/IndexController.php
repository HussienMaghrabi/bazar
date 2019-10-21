<?php

namespace App\Http\Controllers\Admin\City;

use App\City;
use App\Flash_card;
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
        $items = City::orderBy('id', 'desc')->paginate(10);
        return view('admin.cities.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
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
            'country_id' => 'required',
        ]);
        City::create($data);
        session()->flash('success', trans('admin.done'));
        return redirect(url('/admin/cities'));
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
        $item = City::findOrFail($id);
        return view('admin.cities.edit', compact('item'));
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

        $item = City::findOrFail($id);
        $data = $request->validate([
            'name_ar' => '',
            'name_en' => '',
            'country_id' => '',
        ]);
        $item->update($data);
        session()->flash('success', trans('admin.done'));
        return redirect(url('/admin/cities'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = City::findOrFail($id);
        $item->delete();
        session()->flash('success', trans('admin.done'));
        return redirect(url('/admin/cities'));
    }
}
