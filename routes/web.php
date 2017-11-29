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

Route::get('/', function () {
    return view('welcome');
});

require_once 'tuts/tutorials.php';
require_once __DIR__.'/types/types.php';
require_once __DIR__.'/types/categories.php';

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/small_cent', 'HomeController@smallCent')->name('small_cent');
Route::post('/searching', 'HomeController@searching')->name('searching');
Route::get('/searching', 'HomeController@searching')->name('searching');


//Profiles
Route::get('/profile', 'HomeController@profile')->name('profile');