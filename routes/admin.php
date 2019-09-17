<?php

// admin
Route::get('/dash', 'Dashboard\DashboardController@index');

Route::resource('/users','User\IndexController');
Route::resource('/formulas','Formula\IndexController');
Route::resource('/flash_cards','FlashCard\IndexController');
Route::resource('/flash_cards','FlashCard\IndexController');
Route::resource('/flash_cards_items','FlashCardItem\IndexController');
Route::resource('/dictionaries','Dictionary\IndexController');
Route::resource('/knowledge_areas','KnowledgeArea\IndexController');
Route::resource('/knowledge_area_questions','KnowledgeAreaQuestion\IndexController');
Route::resource('/ittos','Itto\IndexController');
Route::resource('/ittos_sections','IttoSection\IndexController');
Route::resource('/ittos_sections_items','IttoSectionItems\IndexController');
Route::resource('/ittos_sections_types','IttoSectionType\IndexController');
Route::resource('/exams','Exam\IndexController');
Route::resource('/notifications','Notification\IndexController');

Route::resource('/products','Product\IndexController');



Route::get('/knowledge_area_questions_answers/{id}','KnowledgeAreaQuestion\AnswersController@index');
Route::get('/userExams/{id}','User\UserExamsController@index');
Route::get('/userNotifiy/{id}','User\UserNotificationController@index');
Route::post('/userNotifiyStore','User\UserNotificationController@userNotifiyStore');

Auth::routes();
