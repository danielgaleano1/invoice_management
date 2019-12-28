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
    Route::resource('invoice', 'InvoiceController');
    Route::resource('client', 'ClientController');
    Route::resource('product', 'ProductController');
    Route::resource('invoice_product', 'InvoiceProductController');
    Route::get('invoice_product/{id}', 'InvoiceController@search_product_modal');
});

Route::get('/', 'HomeController@index')->name('home');
