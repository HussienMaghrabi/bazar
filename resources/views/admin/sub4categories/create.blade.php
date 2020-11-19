@php
    $headers = [
            $resource['header'] => $resource['route'].'.index',
            $resource['action'] => '#',
        ];
@endphp
@extends('admin.layout.forms.add.index')
@section('action' , "sub4categories")
@section('title' , trans('language.'.$resource['title']))
@section('page-title',trans('language.'.$resource['title']))
@section('form-groups')




    {{ Form::open(array('route'=>[$resource['route']. '.store', App::getLocale()],'files'=>true, 'class' => 'form-horizontal')) }}

    @include('admin.' .$resource['view']. '.form')




@endsection
@section('submit-button-title' , trans('language.add'))
{!!Form::close()!!}

