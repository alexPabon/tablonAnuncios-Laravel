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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('anuncios','AnuncioController');
Route::get('anuncios/delete/{anuncio}','AnuncioController@delete')->name('anuncios.delete')->middleware('throttle:3,1');

//para ver mis anuncios
Route::get('publicacion/lomio','AnuncioController@lomio')->name('publicacion.lomio');
