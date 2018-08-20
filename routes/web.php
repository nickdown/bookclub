<?php

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('profile');
    }

    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/{user}', 'UserController@show')->name('users.show');

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::get('/profile/edit', 'UserController@edit')->name('users.edit');
    Route::patch('/profile', 'UserController@update')->name('users.update');

    Route::post('/user/books', 'BookUserController@store');
    Route::patch('/user/books/{book}', 'BookUserController@update');
    Route::patch('/user', 'UserController@update');
    Route::delete('/books/{book}/remove', 'BookUserController@destroy');
    Route::resource('/books', 'BookController');

    Route::post('/comments', 'CommentController@store');
    Route::delete('/comments/{comment}', 'CommentController@destroy');
});
