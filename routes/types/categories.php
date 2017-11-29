<?php
/**
 * Get type
 */
Route::get('/catList}', 'CategoriesController@catPage')->name('catList');
Route::get('/getCategory/{category}', 'CategoriesController@getCategory')->name('getCategory');