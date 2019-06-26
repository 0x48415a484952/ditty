<?php

Route::group(['namespace' => 'Web\Dashboard', 'prefix' => 'dashboard'], function() {
    Route::get('/', 'HomeController@index')->name('dashboard.home');
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::get('/register', 'Auth\RegisterController@showRegisterForm');
    Route::get('/register-author', 'HomeController@index');
    Route::get('/profile', 'HomeController@index');
    Route::get('/organizations', 'HomeController@index');
    Route::resource('/posts', 'HomeController@index');
    Route::resource('/posts', 'HomeResourceController');
    Route::get('/categories', 'HomeController@index');
    Route::get('/comments', 'HomeController@index');
});

Route::get('/sitemap.xml', 'Web\Front\SitemapController@index');
Route::get('/posts/{slug}/{post_id}', 'Web\Front\PostsController@show')->middleware('web');
Route::get('/preview/{post_id}', 'Web\Front\PostsController@preview'); //->middleware('web');
Route::view('/{uri?}', 'front.main')->where('uri', '.*');

