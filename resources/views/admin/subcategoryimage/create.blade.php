@php
    $name = App\SubCategory::find($value);
    $headers = [
       $name['name_'.App::getLocale()] => route('subcategories.index'),
       __('language.'.$resource['header']) => route($resource['route'].'.index', $value),
       __('language.Create') => '#'

    ];
@endphp
@extends('admin.layout.forms.add.index')
@section('action' , "subcategoryimage")
@section('title' , __('language.'.$resource['title']))
@section('page-title',__('language.'.$resource['title']))
@section('form-groups')



    {{ Form::open(array('route'=>[$resource['route']. '.store', App::getLocale()],'files'=>true, 'class' => 'form-horizontal')) }}

    @include('admin.' .$resource['view']. '.form')




@endsection
@section('submit-button-title' , __('language.add'))
{!!Form::close()!!}


