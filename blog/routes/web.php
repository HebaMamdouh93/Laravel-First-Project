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
Route::get('posts','PostsController@index')->name('posts.index')->middleware('auth');
//Create New Post
Route::get('posts/create','PostsController@create')->name('posts.create')->middleware('auth');
Route::post('posts','PostsController@store')->middleware('auth');
//Update Post
Route::get('posts/{post}/edit','PostsController@edit')->name('posts.edit')->middleware('auth');
Route::put('posts/{id}','PostsController@update')->middleware('auth');
//restore deleted post
Route::get('posts/restore','PostsController@restore')->name('posts.restore')->middleware('auth');
//Delete Post
Route::delete('posts/{id}','PostsController@destroy')->middleware('auth');
//Show Post
Route::get('posts/{post}','PostsController@show')->name('posts.show')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





