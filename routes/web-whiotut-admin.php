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
Route::get('/changesomji', 'SmojiController@changesomji');

Route::get('/designer/{gender}', 'SmojiController@create');
Route::post('/smoji/results', 'SmojiController@result');
Route::get('/smoji/savedresults/{datasaved}', 'SmojiController@resultFromSaved');
Route::post('/smoji/saveimg', 'SmojiController@saveimg');
Route::get('/smoji/download/{filename}', 'SmojiController@download');
Route::get('/smoji/detail/{imagename}', 'SmojiController@detailpage');

Route::post('/smoji/payment', 'PaymentController@stripepayment');
Route::post('/smoji/paymentValentine', 'PaymentController@stripepayment_valentine');
Route::get('/smoji/thanks', 'PaymentController@thankyou');

Route::get('/profile','HomeController@profile')->name('changePassword');
Route::post('/profile/save','HomeController@profilesave')->name('profilesave');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

Route::get('/premium','PremiumController@index')->name('premium');
Route::get('/cancel','PaymentController@stripecancel')->name('premium');

Auth::routes();

Route::get('/home', 'SmojiController@index')->name('home');
