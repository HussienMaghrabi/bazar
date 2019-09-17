@extends('admin.layout.forms.add.index')
@section('action' , "knowledge_area_questions")
@section('title' , trans('language.add'))
@section('page-title',trans('language.knowledge_area_questions'))
@section('form-groups')
    @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('language.question_image'),'name'=>'question_image', 'max'=>'2'])
    @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('language.justification_image'),'name'=>'justification_image', 'max'=>'2'])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.question_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.question_ar')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.question_en'),'name'=>'name_en', 'placeholder'=>trans('language.question_en')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.justification_ar'),'name'=>'justification_ar', 'placeholder'=>trans('language.justification_ar')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.justification_en'),'name'=>'justification_en', 'placeholder'=>trans('language.justification_en')])
    @includeIf('admin.components.form.add.select', ['label' => trans("language.category"),'name'=>'knowledge_area_id', 'items'=> \App\Knowledge_area::all() , 'icon' => 'fa fa-list',])
    <H2 class=""> {{trans('language.enterQuestionOptions')}} </H2>
    @includeIf('admin.components.form.add.multitext', ['icon' => 'fa fa-user','label' => trans('language.option_ar'),'name'=>'options_ar', 'placeholder'=>trans('language.option_ar')])
    @includeIf('admin.components.form.add.multitext', ['icon' => 'fa fa-user','label' => trans('language.option_en'),'name'=>'options_en', 'placeholder'=>trans('language.option_en')])
    @includeIf('admin.components.form.add.check', ['id'=>'optionCheck1','name'=>'optionChecks','value'=>'1','class'=>'default','label'=> trans('language.check_coreect_answer')])

    @includeIf('admin.components.form.add.multitext', ['icon' => 'fa fa-user','label' => trans('language.option_ar'),'name'=>'options_ar', 'placeholder'=>trans('language.option_ar')])
    @includeIf('admin.components.form.add.multitext', ['icon' => 'fa fa-user','label' => trans('language.option_en'),'name'=>'options_en', 'placeholder'=>trans('language.option_en')])
    @includeIf('admin.components.form.add.check', ['id'=>'optionCheck2','name'=>'optionChecks','value'=>'2','class'=>'default','label'=>trans('language.check_coreect_answer')])

    @includeIf('admin.components.form.add.multitext', ['icon' => 'fa fa-user','label' => trans('language.option_ar'),'name'=>'options_ar', 'placeholder'=>trans('language.option_ar')])
    @includeIf('admin.components.form.add.multitext', ['icon' => 'fa fa-user','label' => trans('language.option_en'),'name'=>'options_en', 'placeholder'=>trans('language.option_en')])
    @includeIf('admin.components.form.add.check', ['id'=>'optionCheck3','name'=>'optionChecks','value'=>'3','class'=>'default','label'=>trans('language.check_coreect_answer')])

    @includeIf('admin.components.form.add.multitext', ['icon' => 'fa fa-user','label' => trans('language.option_ar'),'name'=>'options_ar', 'placeholder'=>trans('language.option_ar')])
    @includeIf('admin.components.form.add.multitext', ['icon' => 'fa fa-user','label' => trans('language.option_en'),'name'=>'options_en', 'placeholder'=>trans('language.option_en')])
    @includeIf('admin.components.form.add.check', ['id'=>'optionCheck4','name'=>'optionChecks','value'=>'4','class'=>'default','label'=>trans('language.check_coreect_answer')])

@endsection
@section('submit-button-title' , trans('language.add'))
