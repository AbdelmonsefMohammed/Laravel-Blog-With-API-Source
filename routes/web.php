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



Auth::routes();
// admins

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/','PostsController@showall')->name('posts.showall');
Route::get('/admin/posts','PostsController@index')->name('posts.index')->middleware('Admin');
Route::get('/admin/posts/create',"PostsController@create")->name('posts.create');
Route::post('/posts','PostsController@store')->name('posts.store');
Route::get('/posts/{post}','PostsController@show')->name('posts.show');

//un edited yet
Route::get('/admin/posts/edit/{id}',"PostsController@edit")->name('PostsEdit');
Route::post('/admin/posts/update/{id}',"PostsController@update")->name('Postsupdate');
Route::get('/admin/posts/trash/{id}',"PostsController@destroy")->name('PostsTrash');
Route::get('/admin/posts/trashed',"PostsController@trash")->name('PostsTrashed');
Route::get('/admin/posts/delete/{id}',"PostsController@kill")->name('PostsDelete');
Route::get('/admin/posts/restore/{id}',"PostsController@restore")->name('PostsRestore');