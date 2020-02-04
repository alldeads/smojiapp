<?php

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

Route::get('/create-smoji', 'SmojiController@index');
Route::post('/create-smoji', 'SmojiController@index');

Route::get('/', 'SmojiController@index');
Route::get('/savedsmoji', 'SavedSmojiController@index');

Route::get('/designer/{gender}', 'SmojiController@create');
Route::post('/smoji/results', 'SmojiController@result');
Route::get('/smoji/savedresults/{datasaved}', 'SmojiController@resultFromSaved');
Route::post('/smoji/saveimg', 'SmojiController@saveimg');
Route::get('/smoji/download/{filename}', 'SmojiController@download');

Route::post('/smoji/payment', 'PaymentController@stripepayment');

Auth::routes();

Route::get('/home', 'SmojiController@index')->name('home');
