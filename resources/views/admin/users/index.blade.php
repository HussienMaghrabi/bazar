@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{trans('language.image')}}</th>
    <th>{{trans('web.userName')}}</th>
    <th>{{trans('language.email')}}</th>
    <th>{{trans('language.paid_status')}}</th>
    <th>{{trans('language.register_at')}}</th>
    <th>{{trans('language.settings')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td> @includeIf("admin.components.image.index" , ["url" => $item->dash_image])</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td><label class="label label-info"> {{$item->dash_is_paid}} </label></td>
            <td>{{$item->created}}</td>
            <td>
                @includeIf("admin.components.buttons.custom" , ["href" => "userNotifiy/$item->id", 'class' => 'default' , 'title'=> trans('Notification'), 'icon' => 'fa fa-bell'])
                @includeIf("admin.components.buttons.custom" , ["href" => "userExams/$item->id", 'class' => 'default' , 'title'=> trans('Exams'), 'icon' => 'fa fa-question'])
                <br>
                @includeIf("admin.components.buttons.edit" , ["href" => "users/$item->id/edit"])
                @includeIf("admin.components.buttons.delete",["message" => "($item->dash_name)" ,  "action" => url("admin/users/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection

@section("filters")

    <div class="col-md-11">
        <div class="row">

            <div >
                <form method="get" action="{{url("/admin/users/")}}">
                    <div style="display: block">
                        <input type="hidden" class="form-control" name="all"
                               value="">
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-primary " value="{{trans('language.user_list')}}">
                        </div>
                    </div>
                </form>
            </div>

            <div >
                <form method="get" action="{{url("/admin/users/")}}">
                    <div style="display: block">
                        <input type="hidden" class="form-control" name="online"
                               value="{{\App\ModulesConst\UserOnlineStatus::online}}">
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-dropbox " value="{{trans('language.online_users')}}">
                        </div>
                    </div>
                </form>
            </div>


            <div >
            <form method="get" action="{{url("/admin/users/")}}">
                <div style="display: block">
                    <input type="hidden" class="form-control" name="offline"
                           value="{{\App\ModulesConst\UserOnlineStatus::offline}}">
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-dark " value="{{trans('language.offline_users')}}">
                    </div>
                </div>
            </form>
        </div>
        <br>
        <br>
            <div >
                <form method="get" action="{{url("/admin/users/")}}">
                    <div style="display: block">
                        <input type="hidden" class="form-control" name="is_paid"
                               value="{{\App\ModulesConst\UserPaidTyps::paid}}">
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-dribbble " value="{{trans('language.paid_users')}}">
                        </div>
                    </div>
                </form>
            </div>

            <div >
                <form method="get" action="{{url("/admin/users/")}}">
                    <div style="display: block">
                        <input type="hidden" class="form-control" name="free"
                               value="{{\App\ModulesConst\UserPaidTyps::free}}">
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-facebook " value="{{trans('language.unpaid_users')}}">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

@stop


