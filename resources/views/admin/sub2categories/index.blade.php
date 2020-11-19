@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{__('language.image')}}</th>
    <th>{{__('language.name')}}</th>
    <th>{{__('language.subcategories')}}</th>
    <th>{{trans('language.Sort')}}</th>
    <th>{{__('language.created_at')}}</th>
    <th>{{__('language.settings')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
             <td> @includeIf("admin.components.image.index" , ["url" => $item->dash_image])</td>
             
            <td>{{ $item['name_'.App::getLocale()] }}</td>
            
                <td>{{$item->sub_category['name_'.App::getLocale()]}}</td>
                
                <td>{{$item->sort}}</td>
          
            <td>{{$item->dash_created}}</td>
            
            <td>
                @includeIf("admin.components.buttons.edit" , ["href" => "sub2categories/$item->id/edit"])
                @includeIf("admin.components.buttons.delete",["message" => "($item->dash_name)" ,  "action" => url("admin/sub2categories/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection


