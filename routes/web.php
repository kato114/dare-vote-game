<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/dare', 'HomeController@dare')->name('dare');
Route::get('/darelist', 'HomeController@get_dares')->name('get_dares');
Route::post('/vote', 'HomeController@vote')->name('vote');
Route::get('/post', 'HomeController@post')->name('post');
Route::post('/post', 'HomeController@create')->name('create');
Route::get('/voting', 'HomeController@voting')->name('voting');
Route::get('/buy', 'HomeController@buy')->name('buy');
Route::get('/wpaper', 'HomeController@wpaper')->name('wpaper');
Route::get('/works', 'HomeController@works')->name('works');
