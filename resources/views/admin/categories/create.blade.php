@php
    $headers = [
            $resource['header'] => $resource['route'].'.index',
            $resource['action'] => '#',
        ];
@endphp
@extends('admin.layout.forms.add.index')
@section('action' , "categories")
@section('title' , __('language.'.$resource['title']))
@section('page-title',__('language.'.$resource['title']))
@section('form-groups')




    {{ Form::open(array('route'=>[$resource['route']. '.store', App::getLocale()],'files'=>true, 'class' => 'form-horizontal')) }}

    @include('admin.' .$resource['view']. '.form')




@endsection
@section('submit-button-title' , __('language.add'))
{!!Form::close()!!}

