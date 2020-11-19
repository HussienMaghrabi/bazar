<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Adv_slider;
use App\Advertisement;
use App\Country;
use App\Http\Controllers\Controller;
use App\Slider;
use App\User;
use App\Category;
use App\SubCategory;
use App\Sub2Category;
use App\Sub3Category;
use App\Sub4Category;
use App\City;

class DashboardController extends Controller
{
    private $resource = [
        'route' => 'dash',
        'icon' => "home",
        'title' => "DASHBOARD",
        'action' => "",
        'header' => "home"
    ];

    public function index()
    {
        $statistics = [
            'users'             => User::count(),
            'countries'         => Country::count(),
            'cities'            => City::count(),
            'categories'        => Category::count(),
            'subcategories'     => SubCategory::count(),
            'sub2categories'    => Sub2Category::count(),
            'sub3categories'    => Sub3Category::count(),
            'sub4categories'    => Sub4Category::count(),
            'advertisement'     => Advertisement::count(),
            'slider'            => Slider::count(),
            'adv_slider'        => Adv_slider::count(),
        ];
        $resource = $this->resource;
        return view('admin.dashboard.index', compact('statistics', 'resource'));
    }
}
