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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('invoice', 'invoice_controller');

Route::get('/invoice/{id}/confirm_delete', 'invoice_controller@confirm_delete');

Route::resource('client', 'client_controller');