@extends('admin.layout.index')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1>{{trans('web.statistics')}}</h1>
            </div>
        </div>
    </div>

    @php
        $all_clients = \App\User::where('user_type_id', \App\ModulesConst\UserTyps::user)->get();
        $all_formulas = \App\Formula::get();
        $all_flash_cards = \App\Flash_card::get();
        $all_flash_cards_items = \App\Flash_card_items::get();
        $all_dictionaries = \App\Dictionary::get();
        $all_knowledge_areas = \App\Knowledge_area::get();
        $all_knowledge_area_questions = \App\Knowledge_area_questions::get();
        $all_knowledge_area_questions_options = \App\Knowledge_area_question_options::get();
        $all_exams = \App\Exam::get();
        $all_user_paid= \App\User::where('paid_version',\App\ModulesConst\UserPaidTyps::paid)->get();
        $all_user_online= \App\User::where('online',\App\ModulesConst\UserOnlineStatus::online)->get();
        $all_user_offline= \App\User::where('online',\App\ModulesConst\UserOnlineStatus::offline)->get();

        $all_ittos= \App\Itto::get();
        $all_ittos_sections= \App\Itto_sections::get();
        $all_ittos_sections_types= \App\Itto_sections_type::get();
        $all_ittos_sections_items= \App\Itto_sections_items::get();


    // Today Users
    $Todayusers = \App\User::where('user_type_id',\App\ModulesConst\UserTyps::user)->whereDate('created_at', Carbon\Carbon::today())->get();

    @endphp

    <style>
        a {
            color: #E96F6E;
        }


    </style>
    <div class="col-lg-3 col-12 animated bounce delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body ">
                    <a href="{{url('/admin/users')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted">{{trans('language.clients')}} </h4>
                                <h1>{{count($all_clients)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-user success fa-lg float-right  ">
                                    <div class="notify">
                                        <span class="heartbit"></span> <span class="point"></span></div>
                                </i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-12 animated fadeInLeft delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/formulas')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('language.formulas')}} </h4>
                                <h1>{{count($all_formulas)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-list-ol success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated zoomInDown delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/flash_cards')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('language.flash_cards')}} </h4>
                                <h1>{{count($all_flash_cards)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-list-alt success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-12 animated fadeInLeft delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/flash_cards_items')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('language.flash_cards_items')}} </h4>
                                <h1>{{count($all_flash_cards_items)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-th-list success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated tada delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/dictionaries')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('language.dictionaries')}} </h4>
                                <h1>{{count($all_dictionaries)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-book success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated lightSpeedIn delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/knowledge_areas')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('language.knowledge_areas')}} </h4>
                                <h1>{{count($all_knowledge_areas)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-bullseye success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-12 animated fadeInDownBig delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/knowledge_area_questions')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('language.questions')}} </h4>
                                <h1>{{count($all_knowledge_area_questions)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-question success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated  jello delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/knowledge_area_questions')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('Answers')}} </h4>
                                <h1>{{count($all_knowledge_area_questions_options)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-chain-broken success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-12 animated heartBeat delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/exams')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('Exams')}} </h4>
                                <h1>{{count($all_exams)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-database success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated rotateInUpRight delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/users?is_paid=2')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('Paid Users')}} </h4>
                                <h1>{{count($all_user_paid)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-money success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated jello delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/users?online=1')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('Online Users')}} </h4>
                                <h1>{{count($all_user_online)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-grav success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-12 animated wobble delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/offline=2')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('Offline Users')}} </h4>
                                <h1>{{count($all_user_offline)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-power-off success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-12 animated shake delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/ittos')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('Ittos')}} </h4>
                                <h1>{{count($all_ittos)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-dashcube success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated rubberBand delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/ittos_sections')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('Ittos Sections')}} </h4>
                                <h1>{{count($all_ittos_sections)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-life-bouy success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-12 animated pulse delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/ittos_sections_types')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('Ittos Sections Types')}} </h4>
                                <h1>{{count($all_ittos_sections_types)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-life-bouy success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated tada delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <a href="{{url('/admin/ittos_sections_items')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted"> {{trans('Ittos Sections Items')}} </h4>
                                <h1>{{count($all_ittos_sections_items)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-life-bouy success fa-lg float-right"></i>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    {{-- list of Recent users who Register Today   --}}
    {{--    <div class="col-12">--}}
    {{--        <div class="card">--}}
    {{--            <div class="card-body">--}}
    {{--                <h1> {{ trans('# Recent Register Users') }}</h1>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    {{--    <section id="team" class="text-center section">--}}
    {{--        <div class="container">--}}

    {{--            <div class="row">--}}
    {{--                @if(count($Todayusers) > 0 )--}}
    {{--                @foreach($Todayusers as $user)--}}
    {{--                    <div class="col-lg-2 col-12 col-md-4">--}}
    {{--                        <div class="team">--}}
    {{--                            <div class="team-image">--}}
    {{--                                <a href="#">--}}
    {{--                                    <img src="{{$user->image}}"--}}
    {{--                                         class=" userImage img-responsive" style="border-radius: 10%;height: 100px;width: 150px">--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="team-content">--}}
    {{--                            <div class="team-name"><h5>Herman Mach</h5></div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--                    @else--}}
    {{--                    <h4>{{trans('language.no_data')}}</h4>--}}
    {{--                    @endif--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </section>--}}



@endsection
