<?php
/**
 * Get type
 */

Route::get('/getVersion/{version}', 'CategoryVersionController@getVersion')->name('getVersion');