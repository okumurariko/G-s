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

// Route::get('welcome', 'HomeController@welcome')->name('welcome');
Route::get('index', 'PostsController@index')->name('top')->middleware('auth');


Route::resource('posts', 'PostsController', ['only' => ['create', 'store']])->middleware('auth');
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show']])->middleware('auth');
Route::resource('comments', 'CommentsController', ['only' => ['store']])->middleware('auth');
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update']])->middleware('auth');
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']])->middleware('auth');
Auth::routes();


// Auth::resource('posts', 'PostsController', ['only' => ['create', 'store']]); //これ入れるとcreateページ自体開かなくなる
Route::get('/home', 'HomeController@index')->name('home');
