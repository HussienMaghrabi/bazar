@extends('admin.layout.forms.add.index')
@section('action' , "products")
@section('title' , trans('language.add'))
@section('page-title',trans('language.formulas'))
@section('form-groups')

    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.code'),'name'=>'google_code', 'placeholder'=>trans('language.code')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.price'),'name'=>'price', 'placeholder'=>trans('language.price')])

@endsection
@section('submit-button-title' , trans('web.add'))
