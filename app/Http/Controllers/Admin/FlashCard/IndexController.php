<?php

namespace App\Http\Controllers\Admin\FlashCard;

use App\Flash_card;
use App\Flash_card_favourite;
use App\Flash_card_items;
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
        $items = Flash_card::orderBy('id', 'desc')->paginate(10);
        return view('admin.flash_cards.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flash_cards.create');
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
        if ($data['image']) {
            $data['image'] = $this->storeImage($data['image']);
        }
        $flash_card = Flash_card::create($data);
        return redirect(url('/admin/flash_cards'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Flash_card_items::where('flash_card_id',$id)->orderBy('id','desc')->paginate(10);
        return view('admin.flash_cards.show', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Flash_card::findOrFail($id);
        return view('admin.flash_cards.edit', compact('item'));
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
        $item = Flash_card::findOrFail($id);
        $data = $request->validate([
            'name_ar' => '',
            'name_en' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        if ($request->image) {
            $data['image'] = $this->storeImage($data['image']);
        }
        $item->update($data);
        return redirect(url('/admin/flash_cards'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Flash_card::findOrFail($id)->delete();
        Flash_card_items::where('flash_card_id',$id)->delete();
        return redirect(url('/admin/flash_cards'));
    }
}
