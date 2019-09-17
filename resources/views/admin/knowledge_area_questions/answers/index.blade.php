@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{trans('language.name')}}</th>
    <th>{{trans('language.status')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->dash_name }}</td>
            <td>{{ $item->dash_answer_status }}</td>
        </tr>
    @endforeach
@endsection


