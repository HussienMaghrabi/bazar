<?php

namespace App\Http\Controllers\Admin\KnowledgeAreaQuestion;

use App\Knowledge_area;
use App\Knowledge_area_question_options;
use App\Knowledge_area_questions;
use App\ModulesConst\QuestionOptionsStatus;
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
        $items = Knowledge_area_questions::orderBy('id', 'desc')->paginate(10);
        return view('admin.knowledge_area_questions.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.knowledge_area_questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'options_ar' => 'required',
            'options_en' => 'required',
            'optionChecks' => 'required',
            'justification_ar' => 'required',
            'justification_en' => 'required',
            'question_image' => 'mimes:jpeg,jpg,png,gif|max:2048',
            'justification_image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);



        $data = $request->all();
        if ($request->question_image) {
            $data['question_image'] = $this->storeImage($data['question_image']);
        }
        if ($request->justification_image) {
            $data['justification_image'] = $this->storeImage($data['justification_image']);
        }

        $question = Knowledge_area_questions::create($data);

        // Store New Options .
        $ar_options = $request->options_ar;
        $en_options = $request->options_en;
        $question_id = $question->id;
        $correct_answer = $request->optionChecks; // ( 2 = correct , 1 => wrong ) .

        for ($i = 0 ; $i < count($ar_options) ; $i++)
        {
            $input['knowledge_area_question_id'] = $question_id;
            $input['name_ar'] = $ar_options[$i];
            $input['name_en'] = $en_options[$i];

            if($correct_answer - 1  == $i)
            {
                $input['answer_status'] = QuestionOptionsStatus::right;
            }else{
                $input['answer_status'] = QuestionOptionsStatus::wrong;
            }
            Knowledge_area_question_options::create($input);
        }

        return redirect(url('/admin/knowledge_area_questions'));
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
        $item = Knowledge_area_questions::findOrFail($id);
        return view('admin.knowledge_area_questions.edit', compact('item'));
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
        //todo ( update two images ) .
        $item = Knowledge_area_questions::findOrFail($id);
        $data = $request->validate([
            'knowledge_area_id' => '',
            'name_en' => '',
            'justification_ar' => '',
            'justification_en' => '',
        ]);
        $item->update($data);
        return redirect(url('/admin/knowledge_area_questions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Knowledge_area_questions::findOrFail($id)->delete();
        return redirect(url('/admin/knowledge_area_questions'));
    }
}
