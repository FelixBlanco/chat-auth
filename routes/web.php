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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('getConver','HomeController@getConver')->name('getConver');
Route::get('newConver','HomeController@newConver')->name('newConver');

Route::get('getChat/{idConversacion}','HomeController@getChat')->name('getChat/{idConversacion}');
Route::post('storeChat','HomeController@storeChat')->name('storeChat');
