@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{trans('language.key')}}</th>
    <th>{{trans('language.value')}}</th>
    <th>{{trans('language.category')}}</th>
    <th>{{trans('language.created_at')}}</th>
    <th>{{trans('language.settings')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->dash_key}}</td>
            <td>{{$item->dash_value}}</td>
            <td>{{$item->dash_category_name}}</td>
            <td>{{$item->dash_created}}</td>
            <td>
                @includeIf("admin.components.buttons.edit" , ["href" => "flash_cards_items/$item->id/edit"])
                @includeIf("admin.components.buttons.delete",["message" => "($item->dash_name)"  ,  "action" => url("admin/flash_cards_items/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection


