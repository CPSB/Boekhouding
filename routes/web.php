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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@indexBackend')->name('home');

// Account settings routes
Route::get('account', 'AccountSettingsController@index')->name('account.settings');

Route::resource('/transacties', 'TransactieController');
Route::resource('/rekeningen', 'RekeningController');
