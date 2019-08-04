<?php

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// customer
Route::get('/customer', 'CustomerController@getCustomer');
Route::get('/customer/datatable', 'CustomerController@datatable');
Route::get('/customer/form/{id?}', 'CustomerController@form');

// tukang
Route::get('/tukang', 'TukangController@getTukang');
Route::get('/tukang/form/{id?}', 'TukangController@showTukang');
Route::post('/tukang/form/{id?}', 'TukangController@doTukang');
Route::get('/tukang/datatable', 'TukangController@datatable');

Route::get('orders/datatable/{type?}', 'OrderController@getDatatable');
Route::get('order/form/{id}', 'OrderController@showOrder');
Route::get('orders/export/{type?}', 'OrderController@doReportOrder');
Route::get('orders/{type?}', 'OrderController@getOrder');
