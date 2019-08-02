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
    Route::get('/group-posts', 'HomeController@index');
});

Route::group(['namespace' => 'Web\Front'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('/sitemap.xml', 'SitemapController@index');
    Route::get('/posts/{slug}/{post_id}', 'HomeController@index');
    Route::get('/@{username}', 'HomeController@index');
    Route::get('/tags/{tag}', 'HomeController@index');
    Route::get('/categories/{id}/{slug?}', 'HomeController@index');
    Route::get('/posts', 'HomeController@index');
    Route::get('/preview/{post_id}', 'HomeController@index');
    Route::any('/{uri?}', 'HomeController@notFound')->where('uri', '.*');
});

