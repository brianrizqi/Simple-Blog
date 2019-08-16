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

//Route::get('/', function () {
//    return view('welcome');
//})->name('index');

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('index');

Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');
Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
Route::delete('/post/delete/{id}', 'PostController@destroy')->name('post.delete');
Route::get('/post/{id}', 'PostController@show')->name('post.show');


Route::delete('/komen/delete/{id}/{id_post}', 'CommentController@destroy')->name('komen.delete');
Route::post('/komen/{id}', 'CommentController@store')->name('komen.store');

Route::get('/city/{id}', 'KotaController@city');
