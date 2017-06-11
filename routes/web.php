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

Route::post('log/create', 'LogController@create')->name('create');
Route::get('log/get/{post}', 'LogController@get')->name('show');
Route::put('log/update/{post}', 'LogController@update')->name('update');
Route::delete('log/delete/{post}', 'LogController@delete')->name('delete');
Route::get('log/index', 'LogController@index')->name('index');

Route::post('log/create_owner', 'LogController@create_owner')->name('create_owner');
Route::get('log/get_owner/{post}', 'LogController@get_owner')->name('get_owner');
Route::put('log/update_owner/{post}', 'LogController@update_owner')->name('update_owner');
Route::delete('log/delete_owner/{post}', 'LogController@delete_owner')->name('delete_owner');
Route::get('log/index_device', 'LogController@index_device')->name('index_device');

Route::post('log/create_device', 'LogController@create_device')->name('create_device');
Route::get('log/get_device/{post}', 'LogController@get_device')->name('get_device');
Route::put('log/update_device/{post}', 'LogController@update_device')->name('update_device');
Route::delete('log/delete_device/{post}', 'LogController@delete_device')->name('delete_device');
Route::get('log/index_device', 'LogController@index_device')->name('index_device');
