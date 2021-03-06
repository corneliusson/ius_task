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

Route::get('log/index', 'LogController@index')->name('index');
//Route::get('log', 'LogController@index');
Route::get('log', function(){
	return redirect()->route('index');
});


Route::get('log/get/{post}', 'LogController@get');
Route::get('log/isresolved','LogController@isresolved');
Route::get('log/edit/{post}', 'LogController@edit');


Route::get('log/create', 'LogController@create');
Route::put('log/store/{post}', 'LogController@store');
Route::post('log/store', 'LogController@store');
Route::put('log/update/{post}', 'LogController@update');


Route::put('log/update/{post}', 'LogController@update');
Route::delete('log/destroy/{post}', 'LogController@destroy');

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
