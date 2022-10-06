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

Route::get('/masuk', function () {
    return view('auth.masuk');
});

Route::get('/admin', function () {
    return view('backend.admin');
});

Route::get('/flyodra','ControllerLyodra@flyodra');
Route::get('/','ControllerLyodra@flyodra')->middleware('auth');
Route::get('/frossa','ControllerRossa@frossa');
Route::get('/fyurayunita','ControllerYuraYunita@fyurayunita');
Route::get('/favamax','ControllerAvaMax@favamax');
Route::get('/fonedirection','ControllerOneDirection@fonedirection');
Route::get('/fcoldplay','ControllerColdplay@fcoldplay');

Route::get('/lyodra','ControllerLyodra@index')->middleware('auth'); //@ adalah method
Route::get('/cariflyodra','ControllerLyodra@cariflyodra');
Route::get('/tambah_lyodra','ControllerLyodra@create')->middleware('auth');
Route::delete('/lyodra/{lyodra}','ControllerLyodra@destroy')->middleware('auth');
Route::post('/prosestambahlyodra','ControllerLyodra@store')->middleware('auth');
Route::get('/edit_lyodra/{lyodra}','ControllerLyodra@edit')->middleware('auth');
Route::patch('/editlyodra/{lyodra}','ControllerLyodra@update')->middleware('auth');
Route::get('/lihat_lyodra/{lyodra}','ControllerLyodra@show')->middleware('auth');

Route::get('/rossa','ControllerRossa@index')->middleware('auth'); //@ adalah method
Route::get('/carifrossa','ControllerRossa@carifrossa');
Route::get('/tambah_rossa','ControllerRossa@create')->middleware('auth');
Route::delete('/rossa/{rossa}','ControllerRossa@destroy')->middleware('auth');
Route::post('/prosestambahrossa','ControllerRossa@store')->middleware('auth');
Route::get('/edit_rossa/{rossa}','ControllerRossa@edit')->middleware('auth');
Route::patch('/editrossa/{rossa}','ControllerRossa@update')->middleware('auth');
Route::get('/lihat_rossa/{rossa}','ControllerRossa@show')->middleware('auth');

Route::get('/yurayunita','ControllerYuraYunita@index')->middleware('auth'); //@ adalah method
Route::get('/carifyurayunita','ControllerYuraYunita@carifyurayunita');
Route::get('/tambah_yurayunita','ControllerYuraYunita@create')->middleware('auth');
Route::delete('/yurayunita/{yurayunita}','ControllerYuraYunita@destroy')->middleware('auth');
Route::post('/prosestambahyurayunita','ControllerYuraYunita@store')->middleware('auth');
Route::get('/edit_yurayunita/{yurayunita}','ControllerYuraYunita@edit')->middleware('auth');
Route::patch('/edityurayunita/{yurayunita}','ControllerYuraYunita@update')->middleware('auth');
Route::get('/lihat_yurayunita/{yurayunita}','ControllerYuraYunita@show')->middleware('auth');

Route::get('/avamax','ControllerAvaMax@index')->middleware('auth'); //@ adalah method
Route::get('/carifavamax','ControllerAvaMax@carifavamax');
Route::get('/tambah_avamax','ControllerAvaMax@create')->middleware('auth');
Route::delete('/avamax/{avamax}','ControllerAvaMax@destroy')->middleware('auth');
Route::post('/prosestambahavamax','ControllerAvaMax@store')->middleware('auth');
Route::get('/edit_avamax/{avamax}','ControllerAvaMax@edit')->middleware('auth');
Route::patch('/editavamax/{avamax}','ControllerAvaMax@update')->middleware('auth');
Route::get('/lihat_avamax/{avamax}','ControllerAvaMax@show')->middleware('auth');

Route::get('/onedirection','ControllerOneDirection@index')->middleware('auth'); //@ adalah method
Route::get('/carifonedirection','ControllerOneDirection@carifonedirection');
Route::get('/tambah_onedirection','ControllerOneDirection@create')->middleware('auth');
Route::delete('/onedirection/{onedirection}','ControllerOneDirection@destroy')->middleware('auth');
Route::post('/prosestambahonedirection','ControllerOneDirection@store')->middleware('auth');
Route::get('/edit_onedirection/{onedirection}','ControllerOneDirection@edit')->middleware('auth');
Route::patch('/editonedirection/{onedirection}','ControllerOneDirection@update')->middleware('auth');
Route::get('/lihat_onedirection/{onedirection}','ControllerOneDirection@show')->middleware('auth');

Route::get('/coldplay','ControllerColdplay@index')->middleware('auth'); //@ adalah method
Route::get('/carifcoldplay','ControllerColdplay@carifcoldplay');
Route::get('/tambah_coldplay','ControllerColdplay@create')->middleware('auth');
Route::delete('/coldplay/{coldplay}','ControllerColdplay@destroy')->middleware('auth');
Route::post('/prosestambahcoldplay','ControllerColdplay@store')->middleware('auth');
Route::get('/edit_coldplay/{coldplay}','ControllerColdplay@edit')->middleware('auth');
Route::patch('/editcoldplay/{coldplay}','ControllerColdplay@update')->middleware('auth');
Route::get('/lihat_coldplay/{coldplay}','ControllerColdplay@show')->middleware('auth');

Route::get('/user','ControllerUser@index')->middleware('auth'); //@ adalah method
Route::delete('/user/{user}','ControllerUser@destroy')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
