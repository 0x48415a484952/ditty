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

Route::group(['namespace' => 'Api\v1', 'prefix' => 'v1'], function() {
    Auth::routes();

    Route::group(['prefix' => 'posts'], function() {
        Route::get('/', 'PostsController@index');
        Route::post('/', 'PostsController@store')->middleware('auth:api');
    });

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('/profile', 'ProfileController@show');
        Route::put('/profile', 'ProfileController@update');
    });
});
