<?php

use Illuminate\Support\Facades\Artisan;
use function GuzzleHttp\Promise\exception_for;

use App\Traits\AddressIp;

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
    //guarda la direccion Ip del cliente
    AddressIp::guardarIp();
    
    return view('welcome');
});

Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('anuncios','AnuncioController');
Route::resource('mensajes','MessagesController');
Route::get('anuncios/delete/{anuncio}','AnuncioController@delete')
        ->name('anuncios.delete')->middleware('throttle:3,1');

//para ver mis anuncios
Route::get('publicacion/lomio','AnuncioController@lomio')
        ->name('publicacion.lomio');

Route::get('/migrar',function(){
    //Artisan::call('migrate');
    // Artisan::call('queue:listen');
    //Artisan::call('queue:restart');
    //Artisan::call('queue:failed-table');
     Artisan::call('schedule:run');
    // Artisan::call('config:cache');
    // Artisan::call('config:clear'); 
    return "Se ha migrado el proyectooooo";
});

Route::get('/liberar',function(){
    Artisan::call('up');
    return "Se ha liberado el proyecto";
});

Route::get('/poneren/mantenimiento',function(){
    Artisan::call('down',['--message'=>'vamos mejor','--allow'=>'192.168.1.43']);
    return view('welcome');
});


