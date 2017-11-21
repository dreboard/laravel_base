<?php
use Illuminate\Http\Request;
/**
 * Tutorial Routes
 */
Route::get('/tut', 'TutorialController@index')->name('tut.home');

Route::post('/tut', 'TutorialController@search')->name('tut.search');