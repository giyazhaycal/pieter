<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@dashboard');

Route::get('check', 'CheckController@index');
Route::post('check/update', 'CheckController@doUpdate');

Route::get('/complete-first', 'CheckController@completeData');
Route::post('/complete-first', 'CheckController@doData');

Route::get('/waiting', 'homeController@waiting');
Route::get('/dashboard', 'homeController@dashboard');

Route::get('lapak', 'LapakController@getLapak');
Route::post('lapak', 'LapakController@doLapak');

// page static
Route::get('tnc', 'PageController@getTnc');
Route::get('panduan', 'PageController@getPanduan');
Route::get('about-us', 'PageController@getAbout');

Route::get('order/{id}', 'OrderController@getOrder');
Route::post('order/{id}', 'OrderController@doOrder');

Route::get('account/history', 'AccountController@getHistory');