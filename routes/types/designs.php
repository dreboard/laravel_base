<?php
/**
 * Get Design
 */
Route::get('/getDesign/{design}', 'DesignController@getDesign')->name('getDesign');

Route::get('/getDesignType/{design}', 'DesignController@getDesignType')->name('getDesignType');