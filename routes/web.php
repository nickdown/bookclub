<?php

Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/{user}', 'UserController@show')->name('users.show');

Route::get('/profile/edit', 'UserController@edit')->name('users.edit');
Route::patch('/profile', 'UserController@update')->name('users.update');

Route::post('/user/books', 'BookUserController@store');
Route::patch('/user/books/{book}', 'BookUserController@update');
Route::patch('/user', 'UserController@update');
Route::delete('/books/{book}/remove', 'BookUserController@destroy');
Route::resource('/books', 'BookController');
