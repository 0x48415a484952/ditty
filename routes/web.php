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
Route::get('/posts/{post}/{slug?}', 'Web\Front\PostsController@show')->middleware('web');
Route::view('/{uri?}', 'front.main')->where('uri', '.*');

