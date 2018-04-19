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
//
Route::group(['middleware' => ['auth:web,social']], function() {
    // uses 'auth' middleware plus all middleware from $middlewareGroups['web']
    Route::get('posts','PostsController@index')->name('posts.index');
    Route::get('posts/create','PostsController@create')->name('posts.create');
    Route::post('posts','PostsController@store');
    //Update Post
    Route::get('posts/{post}/edit','PostsController@edit')->name('posts.edit');
    Route::put('posts/{id}','PostsController@update');
    //restore deleted post
    Route::get('posts/restore','PostsController@restore')->name('posts.restore');
    //Delete Post
    Route::delete('posts/{id}','PostsController@destroy');
    //Show Post
    Route::get('posts/{post}','PostsController@show')->name('posts.show');  
});
//All posts
//Route::get('posts','PostsController@index')->name('posts.index')->middleware(['auth:social', 'auth']);
//Create New Post



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/social', 'SocialController@index')->name('social');
Route::get('/github/login', 'Auth\SocialController@showLoginForm')->name('github.login');
Route::get('github', 'SocialController@index')->name('social.dashboard');
Route::get('github/logout', 'Auth\SocialController@logout')->name('github.logout');


//route ajax request
Route::post('posts/ajax','PostsController@viewAjax')->name('posts.ajax')->middleware('auth');

//login with github account
Route::get('login/github', 'Auth\SocialController@redirectToProvider');
Route::get('login/github/callback', 'Auth\SocialController@handleProviderCallback');



