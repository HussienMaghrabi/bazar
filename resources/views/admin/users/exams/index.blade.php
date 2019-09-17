@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{trans('language.time')}}</th>
    <th>{{trans('language.full_time')}}</th>
    <th>{{trans('language.type')}}</th>
    <th>{{trans('language.status')}}</th>
    <th>{{trans('language.created_at')}}</th>

@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->dash_timer}}</td>
            <td>{{$item->dash_full_time}}</td>
            <td>{{$item->dash_type_title}}</td>
            <td>{{$item->dash_is_end}}</td>
            <td>{{$item->dash_created}}</td>

        </tr>
    @endforeach
@endsection



