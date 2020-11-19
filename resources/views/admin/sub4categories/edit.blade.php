@php
    $headers = [
            $resource['header'] => $resource['route'].'.index',
            $resource['action'] => '#',
        ];
@endphp
@extends('admin.layout.forms.edit.index')
@section('action' , "sub4categories/$item->id")
@section('title' , trans('language.edit'))
@section('page-title',trans('language.edit'))
@section('form-groups')

    {{ Form::model($item, array('method' => 'PATCH', 'route' => [$resource['route'] . '.update', App::getLocale(), $item->id], 'class' => 'form-horizontal', 'files' => true)) }}

    @include('admin.' .$resource['view']. '.form')


@endsection
@section('submit-button-title' , trans('language.edit'))
{!!Form::close()!!}
