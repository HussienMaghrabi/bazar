<?php


Route::post('/login','UserAuth\LoginController@index');
Route::post('/loginBySocialMedia','UserAuth\LoginController@loginBySocialMedia');
Route::post('/register','UserAuth\RegistrationController@index');

// reset password
Route::post('/forget-password','ResetPassword\indexController@index');
Route::post('/confirm-password-code','ResetPassword\indexController@confirm_code');
Route::post('/resend-password-code','ResetPassword\indexController@resend_password_code');


//terms
Route::post('/terms','Terms\indexController@index');
Route::post('/about-us','About\indexController@index');
Route::post('/contact-us','ContactUs\indexController@index');

Route::post('/countries','Country\indexController@index');
Route::post('/cities','City\indexController@index');

Route::post('/categories','Category\IndexController@index');
Route::post('/sub-categories','SubCategory\IndexController@index');

Route::post('/Country_advertisements','Advertisement\IndexController@Country_advertisements');
Route::post('/City_advertisements','Advertisement\IndexController@City_advertisements');
Route::post('/single_advertisement','Advertisement\IndexController@single_advertisement');




