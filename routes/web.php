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

Route::get('/','HomeController@index')->name('homepage');
Route::get('/contatti','ContattiController@index')->name('contatti');
Route::post('/contatti/store','ContattiController@store')->name('contatti.store');
Route::get('/grazie','ContattiController@grazie')->name('contatti.grazie');
Auth::routes();


Route::middleware('auth')->prefix('/Admin')->namespace('admin')->name('admin.')->group(function(){

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/posts','PostController');

});
