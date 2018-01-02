<?php
/**
 * Get collected coin
 */
Route::get('/collectView/{id}', 'CollectController@collectView')->name('collectView');

Route::post('/postCollectionDamage', 'CollectController@postCollectionDamage')->name('postCollectionDamage');

//Route::get('/postCollectionDamage',array('as'=>'postCollectionDamage',    'uses'=>'CollectController@postCollectionDamage'));


