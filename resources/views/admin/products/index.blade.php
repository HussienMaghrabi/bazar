@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{trans('language.name')}}</th>
    <th>{{trans('language.code')}}</th>
    <th>{{trans('language.price')}}</th>
    <th>{{trans('language.created_at')}}</th>
    <th>{{trans('language.settings')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->dash_name}}</td>
            <td>{{$item->dash_google_code}}</td>
            <td>{{$item->dash_price}}</td>
            <td>{{$item->dash_created}}</td>
            <td>
                @includeIf("admin.components.buttons.edit" , ["href" => "products/$item->id/edit"])
                @includeIf("admin.components.buttons.delete",["message" => "($item->dash_name)"  ,  "action" => url("admin/products/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection


