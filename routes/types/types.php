<?php
/**
 * Get type
 */
Route::get('/typeList}', 'TypesController@typePage')->name('typeList');
Route::get('/getType/{type}', 'TypesController@getType')->name('getType');