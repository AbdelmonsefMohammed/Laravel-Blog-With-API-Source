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

Route::get('/posts','PostsApiController@index');
Route::get('/posts/{post}','PostsApiController@show');
Route::post('/posts','PostsApiController@store');
Route::post('/posts/update/{id}',"PostsApiController@update");
Route::delete('/posts/delete/{id}',"PostsController@destroy");

