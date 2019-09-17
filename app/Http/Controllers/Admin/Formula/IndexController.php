<?php

namespace App\Http\Controllers\Admin\Formula;

use App\Formula;
use App\ModulesConst\UserTyps;
use App\Traits\storeImage;
use App\User;
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
        $items = Formula::orderBy('id', 'desc')->paginate(10);
        return view('admin.formulas.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formulas.create');
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
            'title_ar' => 'required',
            'title_en' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:2048',
        ]);

        if ($data['image']) {
            $data['image'] = $this->storeImage($data['image']);
        }
        $formula = Formula::create($data);
        return redirect(url('/admin/formulas'));
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
        $item = Formula::findOrFail($id);
        return view('admin.formulas.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $item = Formula::findOrFail($id);
        $data = $request->validate([
            'title_ar' => '',
            'title_en' => '',
            'name_ar' => '',
            'name_en' => '',
            'description_ar' => '',
            'description_en' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        if($request->image) { $data['image'] = $this->storeImage($data['image']); }
        $item->update($data);
        return redirect(url('/admin/formulas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id){
        $item = Formula::findOrFail($id)->delete();
        return redirect(url('/admin/formulas'));
    }
}
