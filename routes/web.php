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

Route::get('/','HomeController@index')->name('welcome');
Route::get('myvideos','HomeController@allVideo')->name('myvideos');
Route::get('faq','HomeController@faq')->name('faq');
Route::get('story','HomeController@story')->name('story');
Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');

Auth::routes();




Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'],function(){

   Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
   Route::resource('slider','SliderController');
   Route::resource('category','CategoryController');
   Route::resource('item','ItemController');
   Route::get('reservation','reservationController@index')->name('reservation.index');
   Route::get('reservation/{id}','reservationController@status')->name('reservation.status');
   Route::post('reservation/{id}','reservationController@destroy')->name('reservation.destroy');
   Route::resource('settings','SettingsController');
   Route::resource('price','PriceController');

});
