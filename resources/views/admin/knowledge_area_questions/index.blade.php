@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{trans('language.question_image')}}</th>
    <th>{{trans('language.name')}}</th>
    <th>{{trans('language.justification_image')}}</th>
    <th>{{trans('language.justification')}}</th>
    <th>{{trans('language.category')}}</th>
    <th>{{trans('language.created_at')}}</th>
    <th>{{trans('language.settings')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td> @includeIf("admin.components.image.index" , ["url" => $item->dash_question_image])</td>
            <td>{{$item->dash_name}}</td>
            <td> @includeIf("admin.components.image.index" , ["url" => $item->dash_justification_image])</td>
            <td>{{$item->dash_justification}}</td>
            <td>{{$item->dash_category_name}}</td>
            <td>{{$item->dash_created}}</td>
            <td>
                @includeIf("admin.components.buttons.edit" , ["href" => "knowledge_area_questions/$item->id/edit"])
                @includeIf("admin.components.buttons.delete",["message" => "($item->dash_name)"  ,  "action" => url("admin/knowledge_area_questions/$item->id")])
                @includeIf("admin.components.buttons.show" , ["href" => "knowledge_area_questions_answers/$item->id"])
            </td>
        </tr>
    @endforeach
@endsection


