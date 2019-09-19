<?php


Route::post('/user-profile', 'UserAuth\ProfileController@index');
Route::post('/update-user-profile', 'UserAuth\UpdateProfileController@index');
Route::post('/user-update-fireBaseToken', 'UserAuth\FireBaseTokenUpdateController@index');
Route::post('/user-logout', 'UserAuth\LogoutController@index');
// miss password
Route::post('/reset-new-password','ResetPassword\indexController@reset_new_password');




Route::post('/add-adv-favourite','Advertisement\IndexController@add_adv_favourite');
Route::post('/remove-adv-favourite','Advertisement\IndexController@remove_adv_favourite');
Route::post('/user-favourites','User\UserFavouriteController@index');
Route::post('/user-balance','User\UserBalanceController@index');
Route::post('/user-add-adv','User\UserAddAdvertisementController@index');
Route::post('/user-advs','User\UserAdvertisementListController@index');
