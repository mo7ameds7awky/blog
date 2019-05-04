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
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('categories', 'CategoriesController@index')->name('categories');
    Route::get('categories/show/{id}', 'CategoriesController@show')->name('categories.show');
    Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
    Route::post('categories/store', 'CategoriesController@store')->name('categories.store'); 
    Route::get('categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit');
    Route::post('categories/update/{id}', 'CategoriesController@update')->name('categories.update'); 
    Route::get('categories/delete/{id}', 'CategoriesController@destroy')->name('categories.delete'); 

    Route::get('posts', 'PostsController@index')->name('posts');
    Route::get('posts/trashed', 'PostsController@trashedIndex')->name('posts.trashed');
    Route::get('posts/show/{id}', 'PostsController@show')->name('posts.show');
    Route::get('posts/create', 'PostsController@create')->name('posts.create');
    Route::post('posts/store', 'PostsController@store')->name('posts.store');
    Route::get('posts/edit/{id}', 'PostsController@edit')->name('posts.edit'); 
    Route::post('posts/update/{id}', 'PostsController@update')->name('posts.update'); 
    Route::get('posts/delete/{id}', 'PostsController@destroy')->name('posts.delete');
    Route::get('posts/trash/{id}', 'PostsController@trash')->name('posts.trash');
    Route::get('posts/trashed/restore/{id}', 'PostsController@restore')->name('posts.restore'); 
});