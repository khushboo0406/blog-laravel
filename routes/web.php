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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');
// Route::resource('savedpost', 'PostsController')->only('store');
// Route::resource('allposts', 'PostsController')->only('index');
// Route::get('/index', 'RegistersController@index'); 
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
