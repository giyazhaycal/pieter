<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

// order
Route::get('order/{id?}', 'OrderController@getOrder');
Route::post('order/{id?}', 'OrderController@doOrder');

// Route::get('province/', 'ProvinceController@province');
Route::get('undone', 'OrderController@getUndone');
Route::get('success', 'OrderController@getSuccess');

// akun
Route::get('account', 'AccountController@getAccount');
Route::get('account/history', 'AccountController@getHistory');

// Page Static
Route::get('tnc', 'PageController@getTnc');
Route::get('panduan', 'PageController@getPanduan');
Route::get('about-us', 'PageController@getAbout');

Route::get('done/{order_id?}', 'OrderController@setOrder');