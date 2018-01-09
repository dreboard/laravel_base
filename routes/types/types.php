<?php
/**
 * Get type
 */
Route::post('/postTypeColor', 'TypesController@postTypeColor')->name('postTypeColor');

Route::get('/typeList}', 'TypesController@typePage')->name('typeList');
Route::get('/getType/{type}', 'TypesController@getType')->name('getType');

Route::get('/getTypeByYear/{type}/{year}', 'TypesController@getTypeByYear')->name('getTypeByYear');

Route::get('/getCertfiedType/{type}', 'TypesController@getCertfiedType')->name('getCertfiedType');

//typeCollectedView.blade.php
Route::get('/getTypeCollected/{type}', 'TypesController@getTypeCollected')->name('getTypeCollected');

//typeColorView.blade.php
Route::get('/getTypeColor/{type}', 'TypesController@getTypeColor')->name('getTypeColor');