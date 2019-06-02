<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(
    [
        'namespace' => 'Api\v1\Dashboard',
        'prefix' => 'v1/dashboard',
    ],
    function() {
        Auth::routes();
        Route::group(['middleware' => 'auth:api'], function() {
            Route::get('/profile', 'ProfileController@index');
            Route::put('/profile', 'ProfileController@update');
            Route::resource('categories', 'CategoriesController');

            Route::group(['prefix' => 'posts'], function() {
                Route::get('/', 'PostsController@index');
                Route::post('/', 'PostsController@store');
                Route::get('/{post}', 'PostsController@show');
                Route::put('/{post}', 'PostsController@update');
                Route::delete('/{post}', 'PostsController@destroy');
                Route::delete('/{post}/comments/{comment}', 'CommentsController@destroy');
            });

            Route::post('/upload-image', 'PhotoUploadController@upload');
            Route::resource('/comments', 'CommentsController');
        });
    }
);

Route::group(['namespace' => 'Api\v1\Front', 'prefix' => 'v1'], function() {
    Route::group(['prefix' => 'posts'], function() {
        Route::get('/', 'PostsController@index');
        Route::get('/{post}', 'PostsController@show');
        Route::get('/{post}/comments', 'CommentsController@index');
        Route::post('/{post}/comments', 'CommentsController@store');
    });

    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', 'CategoriesController@index');
        Route::get('/{category}/posts', 'CategoriesController@posts');
    });

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('/profile', 'ProfileController@show');
        Route::put('/profile', 'ProfileController@update');
    });
});
