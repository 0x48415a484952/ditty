<?php



Route::group(['namespace' => 'Web\Dashboard', 'prefix' => 'dashboard'], function() {
    Route::get('/', 'HomeController@index')->name('dashboard.home');
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::get('/register', 'Auth\RegisterController@showRegisterForm');
    Route::get('/profile', 'HomeController@index');
    Route::get('/organizations', 'HomeController@index');
    Route::get('/posts', 'HomeController@index');
    Route::get('/categories', 'HomeController@index');
    Route::get('/comments', 'HomeController@index');
});

Route::view('/{parameters?}', 'main')->where('parameters', '.*');
