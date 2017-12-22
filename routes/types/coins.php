<?php
/**
 * Get type
 */
Route::get('/typeList}', 'TypesController@typePage')->name('typeList');
Route::get('/getCoin/{id}', 'CoinsController@getCoin')->name('getCoin');

Route::get('/getYear/{year}', 'CoinsController@getYear')->name('getYear');
Route::post('/findYear', 'CoinsController@findYear')->name('findYear');