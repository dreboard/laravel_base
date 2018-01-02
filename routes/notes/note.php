<?php
/**

 */
Route::get('/getNotebook}', 'NotesController@getNotebook')->name('getNotebook')->middleware('auth');;