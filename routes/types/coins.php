<?php
/**
 * Get type
 */
Route::get('/typeList}', 'TypesController@typePage')->name('typeList');
Route::get('/getCoin/{id}', 'CoinsController@getCoin')->name('getCoin');