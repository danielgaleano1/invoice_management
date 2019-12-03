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

Route::resource('invoice', 'invoice_controller');
Route::get('/invoice/{id}/confirm_delete', 'invoice_controller@confirm_delete');

Route::resource('client', 'client_controller');
Route::get('/client/{id}/confirm_delete', 'client_controller@confirm_delete');

Route::resource('invoice_product', 'invoice_product_controller');
Route::get('/invoice_product/{id}/confirm_delete', 'invoice_product_controller@confirm_delete');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
