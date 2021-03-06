<?php
/**
 * Get type
 */
Route::get('/typeList}', 'TypesController@typePage')->name('typeList');
Route::get('/getCoin/{id}', 'CoinsController@getCoin')->name('getCoin');

Route::get('/getYear/{year}', 'CoinsController@getYear')->name('getYear');
Route::post('/findYear', 'CoinsController@findYear')->name('findYear');

Route::get('/detail', 'CoinsController@getReport')->name('detail');

Route::get('/addCoin/{id}', 'CoinsController@addCoin')->name('addCoin');
Route::get('/getCertfiedCoin/{id}', 'CoinsController@getCertfiedCoin')->name('getCertfiedCoin');

Route::get('/getCoinColor/{id}', 'CoinsController@getCoinColor')->name('getCoinColor');

