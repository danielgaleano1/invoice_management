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

Route::group(['middleware' => 'auth'], function () {
    Route::resource('invoice', 'invoice_controller');
    Route::resource('client', 'client_controller');
    Route::resource('product', 'product_controller');
    Route::resource('invoice_product', 'invoice_product_controller');
    Route::get('invoice/{{ invoice->id }}/invoice_product/create', 'invoice_product@create');
    Route::get('invoice_product/create', 'invoice_product@create');
    Route::get('inovice/{{ invoice->id }}', 'invoice@search_product_modal');
});

Route::get('/', 'HomeController@index')->name('home');
