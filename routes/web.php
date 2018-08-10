<?php

Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/{user}', 'UserController@show')->name('users.show');

Route::post('/user/books', 'BookUserController@store');
Route::patch('/user/books/{book}', 'BookUserController@update');
Route::resource('/books', 'BookController');
