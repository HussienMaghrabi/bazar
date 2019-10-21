@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{trans('admin.name')}}</th>
    <th>{{trans('admin.settings')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->dash_name}}</td>
            <td>
                @includeIf("admin.components.buttons.edit" , ["href" => "countries/$item->id/edit"])
                @includeIf("admin.components.buttons.delete",["message" =>  "($item->dash_name)" ,  "action" => url("admin/countries/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection



