<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require_once __DIR__.'/types/collect.php';
Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajaxRequestPost',array('as'=>'ajaxRequestPost',
    'uses'=>'PostController@ajaxRequestPost'));
Route::post('/ajaxRequestPost',array('as'=>'ajaxRequestPost',
    'uses'=>'PostController@ajaxRequestPost'));
Route::get('/ajaxRequest', 'PostController@ajaxRequest');


Route::group(['middleware' => ['auth', 'web']], function () {
    require_once __DIR__.'/notes/note.php';
});
Route::group(['middleware' => []], function () {

});

require_once 'tuts/tutorials.php';
require_once __DIR__.'/types/types.php';
require_once __DIR__.'/types/categories.php';
require_once __DIR__.'/types/coins.php';
require_once __DIR__.'/types/versions.php';
require_once __DIR__.'/types/subcategory.php';
require_once __DIR__.'/types/designs.php';
require_once __DIR__.'/types/metal.php';
require_once __DIR__.'/types/commemorative.php';




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/searching', 'SearchController@searching')->name('searching');
Route::get('/searching', 'SearchController@searching')->name('searching');

Auth::routes();

Route::get('/small_cent', 'HomeController@smallCent')->name('small_cent');


//Profiles
Route::get('/profile', 'HomeController@profile')->name('profile');

