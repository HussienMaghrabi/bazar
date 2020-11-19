@php
    $headers = [
            $resource['header'] => '#',
        ];

            $boxes = [
                  [
                    'title' => __('language.users'),
                    'icon'  => 'users',
                    'data'  => $statistics['users'],
                    'route' => 'admin/users'
                  ],
                  [
                    'title' => __('language.country'),
                    'icon'  => 'globe',
                    'data'  => $statistics['countries'],
                    'route' => 'admin/countries'
                  ],
                  [
                    'title' => __('language.cities'),
                    'icon'  => 'flag',
                    'data'  => $statistics['cities'],
                    'route' => 'admin/cities'
                  ],
                  [
                    'title' => __('language.categories'),
                    'icon'  => 'book',
                    'data'  => $statistics['categories'],
                    'route' => 'admin/categories'
                  ],
                  [
                    'title' => __('language.subcategories'),
                    'icon'  => 'bookmark',
                    'data'  => $statistics['subcategories'],
                    'route' => 'admin/subcategories'
                  ],
                  [
                    'title' => __('language.sub2categories'),
                    'icon'  => 'bookmark',
                    'data'  => $statistics['sub2categories'],
                    'route' => 'admin/sub2categories'
                  ],
                  [
                    'title' => __('language.sub3categories'),
                    'icon'  => 'bookmark',
                    'data'  => $statistics['sub3categories'],
                    'route' => 'admin/sub3categories'
                  ],
                  [
                    'title' => __('language.sub4categories'),
                    'icon'  => 'bookmark',
                    'data'  => $statistics['sub4categories'],
                    'route' => 'admin/sub4categories'
                  ],
                  [
                    'title' => __('language.advertisements'),
                    'icon'  => 'shopping-bag',
                    'data'  => $statistics['advertisement'],
                    'route' => 'admin/advertisements'
                  ],
                  [
                    'title' => __('language.sliders'),
                    'icon'  => 'sliders',
                    'data'  => $statistics['slider'],
                    'route' => 'admin/sliders'
                  ],
                  [
                    'title' => __('language.adv_sliders'),
                    'icon'  => 'sliders',
                    'data'  => $statistics['adv_slider'],
                    'route' => 'admin/adv_sliders'
                  ],
                ];

@endphp
@extends('admin.layout.index')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1>{{trans('web.statistics')}}</h1>
            </div>
        </div>
    </div>

    <style> a {color: #E96F6E;}</style>

    @foreach ($boxes as $box)
    <div class="col-lg-3 col-12 animated swing delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body ">
                    <a href="{{url($box['route'])}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted">{{$box['title']}} </h4>
                                <h1>{{$box['data']}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-{{$box['icon']}}  ">
                                    <div class="">
                                        <span class="heartbit"></span> <span class="point"></span></div>
                                </i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection
