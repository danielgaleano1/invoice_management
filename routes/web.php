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
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('invoice', 'InvoiceController');
    Route::resource('client', 'ClientController');
    Route::resource('product', 'ProductController');
    Route::resource('invoice_product', 'InvoiceProductController');
    Route::resource('payment', 'PaymentController');

    Route::get('invoice/{id}/payment', 'PaymentController@create')->name('invoices.payment');
    Route::post('invoice/{id}/payment', 'PaymentController@store')->name('invoices.payment.store');
    Route::get('invoice/{id}/payment/details', 'PaymentController@show')->name('invoices.payment.show');
    Route::post('invoice_import_excel', 'InvoiceController@import')->name('invoices.import');
});
