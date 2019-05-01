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
// Authentication routes:
// Register and Login Route
Auth::routes();
// Home page route
Route::get('/home', 'HomeController@index')->name('home');

//Pages route
// Welcome page route
Route::get('/', function () {
    return view('welcome');
});


// Posts route
Route::get('posts/create', 'PostsController@create')->name('posts.create');