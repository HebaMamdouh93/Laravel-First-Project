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

//All posts
Route::get('posts','PostsController@index')->name('posts.index');
//Create New Post
Route::get('posts/create','PostsController@create')->name('posts.create');
Route::post('posts','PostsController@store');
//Update Post
Route::get('posts/{post}/edit','PostsController@edit')->name('posts.edit');
Route::put('posts/{id}','PostsController@update');