<?php

// admin
    Route::get('/dash', 'Dashboard\DashboardController@index');

    Route::resource('/users', 'User\IndexController');
    Route::resource('/countries','Country\IndexController');
    Route::resource('/cities','City\IndexController');
    Route::resource('/categories', 'Category\IndexController');
    Route::resource('/contacts','ContactUs\IndexController');


    Route::resource('/sliders','Slider\IndexController');
    Route::resource('/adv_sliders','AdvSlider\IndexController');


    Route::get('/about', 'About\IndexController@index')->name('about');
    Route::put('/about/{id}', 'About\IndexController@update')->name('about_update');
    Route::get('/terms', 'Terms\IndexController@index')->name('terms');
    Route::put('/terms/{id}', 'Terms\IndexController@update')->name('terms_update');


    Route::resource('/notifications', 'Notification\IndexController');
    Route::get('/userNotifiy/{id}', 'User\UserNotificationController@index');
    Route::post('/userNotifiyStore', 'User\UserNotificationController@userNotifiyStore');

    Auth::routes();

