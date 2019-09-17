<?php

namespace App\Http\Controllers\Admin\KnowledgeAreaQuestion;

use App\Knowledge_area_question_options;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswersController extends Controller
{
    public function index($id)
    {
        $items = Knowledge_area_question_options::where('knowledge_area_question_id',$id)->orderBy('id','desc')->paginate(10);
        return view('admin.knowledge_area_questions.answers.index', compact('items'));
    }
}
