<?php


Route::post('/user-profile', 'UserAuth\ProfileController@index');
Route::post('/update-user-profile', 'UserAuth\UpdateProfileController@index');
Route::post('/user-update-fireBaseToken', 'UserAuth\FireBaseTokenUpdateController@index');
Route::post('/user-logout', 'UserAuth\LogoutController@index');


// miss password
Route::post('/reset-new-password','ResetPassword\indexController@reset_new_password');




