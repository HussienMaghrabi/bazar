@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{trans('language.title')}}</th>
    <th>{{trans('language.price')}}</th>
    <th>{{trans('language.category')}}</th>
    <th>{{trans('language.description')}}</th>
    <th>{{trans('language.country')}}</th>
    <th>{{trans('language.city')}}</th>
    <th>{{trans('language.Sort')}}</th>
    <th>{{trans('language.created_at')}}</th>
    <th>{{trans('language.settings')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->dash_name}}</td>
            <td>{{$item->dash_price}}</td>
            <td>{{$item->dash_category_name}}</td>
            <td>{{$item->dash_description}}</td>
            <td>{{$item->dash_country_name}}</td>
            <td>{{$item->dash_city_name}}</td>
            <td>{{$item->sort}}</td>
            <td>{{$item->dash_created}}</td>
            <td>
                @includeIf("admin.components.buttons.edit" , ["href" => "advertisements/$item->id/edit"])
                @includeIf("admin.components.buttons.delete",["message" => "($item->dash_name)" ,  "action" => url("admin/advertisements/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection


