@extends('admin.layout.forms.edit.index')
@section('action' , "knowledge_areas/$item->id")
@section('title' , trans('language.edit'))
@section('page-title',trans('language.edit'))
@section('form-groups')
    @includeIf('admin.components.form.edit.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'image', 'max'=>'2'])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar')])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en')])
    <div class="form-group">
        <label>{{ trans('language.paid')  }}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-check"></i></span>
            </div>
            <select required class="form-control" name="paid_type">
                <option  {{$item->paid_type == 1 ? 'selected' : '' }}  value="1">{{trans('language.free')}}</option>
                <option {{$item->paid_type == 2 ? 'selected' : '' }}  value="2">{{trans('language.paid')}}</option>
            </select>
        </div>
    </div>
@endsection
@section('submit-button-title' , "Edit knowledge Area")
