<?php


Route::post('/login','UserAuth\LoginController@index');
Route::post('/loginBySocialMedia','UserAuth\LoginController@loginBySocialMedia');
Route::post('/register','UserAuth\RegistrationController@index');

// reset password
Route::post('/forget-password','ResetPassword\indexController@index');
Route::post('/confirm-password-code','ResetPassword\indexController@confirm_code');
Route::post('/resend-password-code','ResetPassword\indexController@resend_password_code');


//terms
Route::post('/social-media','SocialMedia\indexController@index');
Route::post('/terms','Terms\IndexController@index');
Route::post('/about-us','About\IndexController@index');
Route::post('/contact-us','ContactUs\IndexController@index');

Route::post('/countries','Country\indexController@index');
Route::post('/cities','City\indexController@index');

Route::post('/categories','Category\IndexController@index');
Route::post('/sub-categories','SubCategory\IndexController@index');
Route::post('/sub-2categories','Sub2Category\IndexController@index');
Route::post('/sub-3categories','Sub3Category\IndexController@index');
Route::post('/sub-4categories','Sub4Category\IndexController@index');

Route::post('/Country_advertisements','Advertisement\IndexController@Country_advertisements');
Route::post('/City_advertisements','Advertisement\IndexController@City_advertisements');
Route::post('/single_advertisement','Advertisement\IndexController@single_advertisement');

Route::post('/offer_advertisement','Advertisement\OfferController@index');


// Home
Route::post('/homePage','Home\IndexController@index');
Route::post('/homePageSearch','Home\IndexController@homePageSearch');




