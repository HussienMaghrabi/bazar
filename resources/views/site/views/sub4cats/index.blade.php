@extends('site.layouts.app')
@section('content')

    <!-- Main container Start -->
    <div class="main-container section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
                    <aside>
                        <!-- Searcg Widget -->
                        <div class="widget_search">
                            <form role="search" id="search-form">
                                <input type="search" class="form-control" autocomplete="off" name="s" placeholder="Search..." id="search-input" value="">
                                <button type="submit" id="search-submit" class="search-btn"><i class="lni-search"></i></button>
                            </form>
                        </div>
                        <!-- Categories Widget -->
                        <div class="widget categories">
                            <h4 class="widget-title">All Categories</h4>
                            <ul class="categories-list">

                                @foreach($items as $item)
                                    <li>
                                        <a href="{{url("/sub4categories", $item->id)}}">
                                            <i class="lni-dinner"></i>
                                            {{ $item['name_'.App::getLocale()]}} <span class="category-counter">{{$subcategory->where('sub3_category_id',$item->id)->count()}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Advertisement</h4>
                            <div class="add-box">
                                <img class="img-fluid" src="{{ $ads_img->image }}" alt="">
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12 page-content">
                    <!-- Product filter Start -->
                    <div class="product-filter">
                        <div class="short-name">
                            <span>Showing (1 - 4 products of {{$ads_count}} products)</span>
                        </div>
                        <div class="Show-item">
                            <span>Show Items</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#grid-view"><i class="lni-grid"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#list-view"><i class="lni-list"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Product filter End -->

                    <!-- Adds wrapper Start -->
                    <div class="adds-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade">
                                <div class="row">
                                    @foreach($ads as $ad)
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="featured-box">
                                                <figure>
                                                    <div class="icon">
                                                        <i class="lni-heart"></i>
                                                    </div>
                                                    <a href="#"><img class="img-fluid" src="{{$ad->serv_one_image}}" alt="" style="height: 265px;width: 397.5px;"></a>
                                                </figure>
                                                <div class="feature-content">
                                                    <div class="product">
                                                        <a href="{{url("/sub4categories", $ad->sub3_category->id)}}"><i class="lni-folder"></i> {{$ad->sub3_category['name_'.App::getLocale()]}}</a>
                                                    </div>
                                                    <h4><a href="ads-details.html">{{$ad->title}}</a></h4>
                                                    <span>Last Updated: {{$ad->dash_update}}</span>
                                                    <ul class="address">
                                                        <li>
                                                            <a href="#"><i class="lni-map-marker"></i>{{$ad->city['name_'.App::getLocale()]}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="lni-alarm-clock"></i> {{$ad->dash_created}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="lni-user"></i> {{$ad->user->name}}</a>
                                                        </li>
                                                    </ul>
                                                    <div class="listing-bottom">
                                                        <h3 class="price float-left">price: {{$ad->price}}</h3>
                                                        <a href="account-myads.html" class="btn-verified float-right"><i class="lni-check-box"></i> Verified Ad</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <div id="list-view" class="tab-pane fade active show">
                                <div class="row">
                                    @foreach($ads as $ad)
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="featured-box">
                                                <figure>
                                                    <div class="icon">
                                                        <i class="lni-heart"></i>
                                                    </div>
                                                    <a href="#"><img class="img-fluid" src="{{$ad->serv_one_image}}" alt="" style="height: 269.5px;width: 404.25px;"></a>
                                                </figure>
                                                <div class="feature-content">
                                                    <div class="product">
                                                        <a href="{{url("/sub4categories", $ad->sub3_category->id)}}"><i class="lni-folder"></i> {{$ad->sub3_category['name_'.App::getLocale()]}}</a>
                                                    </div>
                                                    <h4><a href="ads-details.html">{{$ad->title}}</a></h4>
                                                    <span>Last Updated: {{$ad->dash_update}}</span>
                                                    <ul class="address">
                                                        <li>
                                                            <a href="#"><i class="lni-map-marker"></i>{{$ad->city['name_'.App::getLocale()]}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="lni-alarm-clock"></i> {{$ad->dash_created}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="lni-user"></i> {{$ad->user->name}}</a>
                                                        </li>
                                                    </ul>
                                                    <div class="listing-bottom">
                                                        <h3 class="price float-left">price: {{$ad->price}}</h3>
                                                        <a href="account-myads.html" class="btn-verified float-right"><i class="lni-check-box"></i> Verified Ad</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Adds wrapper End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Main container End -->

@endsection
