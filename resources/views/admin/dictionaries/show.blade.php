@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{trans('language.key')}}</th>
    <th>{{trans('language.value')}}</th>
    <th>{{trans('language.created_at')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->dash_key}}</td>
            <td>{{$item->dash_value}}</td>
            <td>{{$item->dash_created}}</td>
        </tr>
    @endforeach
@endsection


