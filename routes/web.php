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

Route::get('/', function ()
{
    return view('welcome');
});
Route::get('/api/inpi/{brand}', 'ApisController@inpi')->middleware('cors');
Route::get('/api/youtube/{brand}', 'ApisController@youtube')->middleware('cors');
Route::get('/api/whoapi/{brand}', 'ApisController@whoapi')->middleware('cors');
Route::get('/api/gmail/{brand}', 'ApisController@gmail')->middleware('cors');
Route::get('/api/hotmail/{brand}', 'ApisController@hotmail')->middleware('cors');
Route::get('/api/twitter/{brand}', 'ApisController@twitter')->middleware('cors');

