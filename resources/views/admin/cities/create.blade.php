@extends('admin.layout.forms.add.index')
@section('action' , "cities")
@section('title' , trans('language.add'))
@section('page-title',trans('language.cities'))
@section('form-groups')
    @includeIf('admin.components.form.add.select', ['label' => trans("language.country"),'name'=>'country_id', 'items'=> \App\Country::all() , 'icon' => 'fa fa-list',])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('admin.name_ar')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('admin.name_en')])

@endsection
@section('submit-button-title' , trans('admin.add'))
