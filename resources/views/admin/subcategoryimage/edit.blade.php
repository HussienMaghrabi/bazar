@php
    $name = App\SubCategory::find($value);
        $headers = [
               $name['name_'.App::getLocale()] => route('subcategories.index'),
                __('language.'.$resource['header']) => route($resource['route'].'.index', $value),
                __('dashboard.Edit') => '#'
            ];
@endphp
@extends('admin.layout.forms.edit.index')
@section('action' , "subcategoryimage/$item->id")
@section('title' , __('language.edit'))
@section('page-title',__('language.edit'))
@section('form-groups')

    {{ Form::model($item, array('method' => 'PATCH', 'route' => [$resource['route'] . '.update', App::getLocale(), $item->id], 'class' => 'form-horizontal', 'files' => true)) }}

    @include('admin.' .$resource['view']. '.form')


@endsection
@section('submit-button-title' , __('language.edit'))
{!!Form::close()!!}