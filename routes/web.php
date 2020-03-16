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

//user
Route::get('/','HomeController@index')->name('posts.showall');
Route::get('/posts/{post}','HomeController@show')->name('post.show');



// admins
Route::get('/admin', 'postsController@index')->name('home')->middleware('Admin');
Route::get('/admin/posts','PostsController@show')->name('posts.show');
Route::get('/admin/posts/create',"PostsController@create")->name('posts.create');
Route::post('/posts','PostsController@store')->name('posts.store');
Route::get('/admin/{post}/edit/',"PostsController@edit")->name('posts.edit');
Route::patch('/admin/posts/update/{id}',"PostsController@update")->name('posts.update');
Route::get('/admin/posts/trash/{id}',"PostsController@destroy")->name('posts.trash');
Route::get('/admin/posts/trashed',"PostsController@trash")->name('posts.trashed');
Route::get('/admin/posts/delete/{id}',"PostsController@kill")->name('posts.delete');
Route::get('/admin/posts/restore/{id}',"PostsController@restore")->name('posts.restore');






