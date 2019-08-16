<?php

use Illuminate\Http\Request;

//github.com/brianrizqi

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('post', 'PostAPIController@index');
Route::post('post/store', 'PostAPIController@store');
Route::post('post/show', 'PostAPIController@show');

Route::post('komen/store', 'CommentAPIController@store');
