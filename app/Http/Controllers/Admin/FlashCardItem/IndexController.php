<?php

namespace App\Http\Controllers\Admin\FlashCardItem;

use App\Flash_card;
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
        $items = Flash_card_items::orderBy('id', 'desc')->paginate(10);
        return view('admin.flash_cards_items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flash_cards_items.create');
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
            'key_ar' => 'required',
            'key_en' => 'required',
            'value_ar' => 'required',
            'value_en' => 'required',
            'flash_card_id' => 'required',
        ]);
        Flash_card_items::create($data);
        return redirect(url('/admin/flash_cards_items'));
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
        $item = Flash_card_items::findOrFail($id);
        return view('admin.flash_cards_items.edit', compact('item'));
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
        $item = Flash_card_items::findOrFail($id);
        $data = $request->validate([
            'key_ar' => '',
            'key_en' => '',
            'value_ar' => '',
            'value_en' => '',
            'flash_card_id' => '',
        ]);
        $item->update($data);
        return redirect(url('/admin/flash_cards_items'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Flash_card_items::findOrFail($id)->delete();
        return redirect(url('/admin/flash_cards_items'));
    }
}
