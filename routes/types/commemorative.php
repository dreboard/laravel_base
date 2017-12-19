<?php
/**
 * Get Commemoratives
 */

Route::get('/getCommemoratives', 'CommemorativeController@getCommemoratives')->name('getCommemoratives');
Route::get('/getCommemorativeType/{type}', 'CommemorativeController@getCommemorativeType')->name('getCommemorativeType');