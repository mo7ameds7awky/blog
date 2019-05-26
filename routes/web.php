<?php
// Testing route
Route::get('test', function () {
    return App\Category::find(6)->posts;
});

// Authentication routes:
// Register and Login Route
Auth::routes();
// Home page route
Route::get('/home', 'HomeController@index')->name('home');

// FrontEnd routes:
// Welcome page route
Route::get('/', 'FrontEndController@index')->name('homePage');

// Single Post Route
Route::get('/post/{slug}', 'FrontEndController@showPost')->name('singlePost');

// Category route
Route::get('/categoryPosts/{id}', 'FrontEndController@categoryPosts')->name('categoryPosts');

// Tags route
Route::get('/tagsPosts/{id}', 'FrontEndController@tagsPosts')->name('tagsPosts');

// Search route
Route::get('/results', function () {
    $posts = App\Post::where('title', 'like', ('%' . request('query') . '%'))->get();
    
    return view('results')->with('posts', $posts)
                          ->with('title', ('You Searched For: ' . request('query')))
                          ->with('settings', App\Setting::first())
                          ->with('categories', App\Category::take(4)->get());
});


// Admin route
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // Categories routes
    Route::get('categories', 'CategoriesController@index')->name('categories');
    Route::get('categories/show/{id}', 'CategoriesController@show')->name('categories.show');
    Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
    Route::post('categories/store', 'CategoriesController@store')->name('categories.store'); 
    Route::get('categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit');
    Route::post('categories/update/{id}', 'CategoriesController@update')->name('categories.update'); 
    Route::get('categories/delete/{id}', 'CategoriesController@destroy')->name('categories.delete');
    
    // Tags routes
    Route::get('tags', 'TagsController@index')->name('tags');
    Route::get('tags/show/{id}', 'TagsController@show')->name('tags.show');
    Route::get('tags/create', 'TagsController@create')->name('tags.create');
    Route::post('tags/store', 'TagsController@store')->name('tags.store'); 
    Route::get('tags/edit/{id}', 'TagsController@edit')->name('tags.edit');
    Route::post('tags/update/{id}', 'TagsController@update')->name('tags.update'); 
    Route::get('tags/delete/{id}', 'TagsController@destroy')->name('tags.delete');

    // Posts routes
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
    
    // Users routes
    Route::get('users', 'UsersController@index')->name('users');
    Route::get('users/show/{id}', 'UsersController@show')->name('users.show');
    Route::get('users/permission/{id}', 'UsersController@permission')->name('users.permission');
    Route::get('users/create', 'UsersController@create')->name('users.create');
    Route::post('users/store', 'UsersController@store')->name('users.store'); 
    Route::get('users/edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::post('users/update/{id}', 'UsersController@update')->name('users.update'); 
    Route::get('users/delete/{id}', 'UsersController@destroy')->name('users.delete');

    // Profiles routes
    Route::get('profiles/edit', 'ProfilesController@edit')->name('profiles.edit');
    Route::post('profiles/update', 'ProfilesController@update')->name('profiles.update'); 
    Route::get('profiles/delete/{id}', 'ProfilesController@destroy')->name('profiles.delete');

    // Settings routes
    Route::get('settings', 'SettingsController@index')->name('settings');
    Route::post('settings/update', 'SettingsController@update')->name('settings.update'); 
});