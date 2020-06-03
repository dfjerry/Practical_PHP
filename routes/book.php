<?php
Route::get('/', 'WebController@index');
Route::post('/search', 'WebController@search');
Route::get('/new-book', 'WebController@newBook');
Route::post('/save-book', 'WebController@saveBook');
Route::get('/edit-book/{id}', 'WebController@editBook');
Route::put('/update-book/{id}', 'WebController@updateBook');
Route::delete('/delete-book/{id}', 'WebController@deleteBook');
