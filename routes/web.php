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

Route::get('/', function () {
    return view('main.user');
});

Auth::routes();
// admins

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/post','PostsController@index')->name('CreatePost');
Route::post('/home/post/insert','PostsController@store')->name('post_insert');
Route::get('/home/index',"PostsController@all")->name('indexPost')->middleware('Admin');
Route::get('/home/posts/edit/{id}',"PostsController@edit")->name('PostsEdit');
Route::post('/home/posts/update/{id}',"PostsController@update")->name('Postsupdate');
Route::get('/home/posts/trash/{id}',"PostsController@destroy")->name('PostsTrash');
Route::get('/home/posts/trashed',"PostsController@trash")->name('PostsTrashed');
Route::get('/home/posts/delete/{id}',"PostsController@kill")->name('PostsDelete');
Route::get('/home/posts/restore/{id}',"PostsController@restore")->name('PostsRestore');

// users

Route::get('/posts',"PostsController@user")->name('allPosts');