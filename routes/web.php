<?php

Route::get('/', function (){
    return view('welcome');
});
Route::get('/admin', 'Admin\Auth\LoginController@index');
Route::post('/adminlogin', 'Admin\Auth\LoginController@adminlogin');
Route::post('/adminlogout', 'Admin\Auth\LoginController@adminlogout');


Route::get('/clear', function() {
    Artisan::call('cache:clear');
    session()->flash('success',trans('Cache has bees cleared successfully.'));
    return redirect('/');
});

Auth::routes();
