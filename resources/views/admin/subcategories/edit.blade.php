@php
    $headers = [
            $resource['header'] => $resource['route'].'.index',
            $resource['action'] => '#',
        ];
@endphp
@extends('admin.layout.forms.edit.index')
@section('action' , "subcategories/$item->id")
@section('title' , __('language.edit'))
@section('page-title',__('language.edit'))
@section('form-groups')

    {{ Form::model($item, array('method' => 'PATCH', 'route' => [$resource['route'] . '.update', App::getLocale(), $item->id], 'class' => 'form-horizontal', 'files' => true)) }}

    @include('admin.' .$resource['view']. '.form')


@endsection
@section('submit-button-title' , __('language.edit'))
{!!Form::close()!!}

