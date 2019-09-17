@extends('admin.layout.forms.add.index')
@section('action' , "ittos_sections")
@section('title' , trans('language.add'))
@section('page-title',trans('language.ittos_sections'))
@section('form-groups')
    @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'image', 'max'=>'2'])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en')])
    @includeIf('admin.components.form.add.select', ['label' => trans("admin.category"),'name'=>'itto_id', 'items'=> \App\Itto::all() , 'icon' => 'fa fa-list',])

@endsection
@section('submit-button-title' , trans('web.add'))
