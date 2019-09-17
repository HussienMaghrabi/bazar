@extends('admin.layout.forms.add.index')
@section('action' , "knowledge_areas")
@section('title' , trans('language.add'))
@section('page-title',trans('language.knowledge_areas'))
@section('form-groups')
    @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'image', 'max'=>'2'])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en')])
    <div class="form-group">
        <label>{{ trans('language.paid')  }}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-check"></i></span>
            </div>
            <select required class="form-control" name="paid_type">
                    <option value="1">{{trans('language.free')}}</option>
                    <option value="2">{{trans('language.paid')}}</option>
            </select>
        </div>
    </div>

@endsection
@section('submit-button-title' , trans('language.add-knowledge_areas'))
