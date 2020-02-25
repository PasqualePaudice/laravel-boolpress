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

Route::get('/','HomeController@index')->name('main');
Route::get('/contatti','ContattiController@index')->name('contatti');
Route::post('/contatti/store','ContattiController@store')->name('contatti.store');
Route::get('/grazie','ContattiController@grazie')->name('contatti.grazie');

Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/blog/{slug}', 'PostController@show')->name('blog.show');
Route::get('/blog/categorie/{slug}', 'PostController@postCategoria')->name('blog.category');
Route::get('/blog/tag/{slug}', 'PostController@postTag')->name('blog.tag');


Auth::routes();


Route::middleware('auth')->prefix('/Admin')->namespace('admin')->name('admin.')->group(function(){



    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/posts','PostController');

});
