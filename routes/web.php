<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth', 'administrador'])->namespace('Administrador')->group(function () {

        //Técnico
        Route::resource('tecnicos', 'TecnicoController');

        //Administrador
        Route::resource('administradores', 'AdministradorController');

        //Cliente
        Route::resource('clientes', 'ClienteController');

});
Route::middleware(['auth', 'cliente'])->group(function () {

    Route::get('/orden_trabajos/create', 'OrdenTrabajoController@create');
});


Route::middleware('auth')->group(function () {

         // Orden de Trabajo
         Route::get('/orden_trabajos', 'OrdenTrabajoController@indexweb');

         
         Route::post('/orden_trabajos', 'OrdenTrabajoController@storeweb');

         Route::get('/orden_trabajos/{orden_trabajos}/edit', 'OrdenTrabajoController@edit');
         
         
         Route::post('/orden_trabajos/{orden_trabajo}/cancelar', 'OrdenTrabajoController@cancelar');
         Route::post('/orden_trabajos/{orden_trabajo}/confirmar', 'OrdenTrabajoController@confirmar');

         
});


    
    
    //Zona
    Route::get('/zonas', 'ZonaController@indexweb');
    Route::get('/zonas/create', 'ZonaController@create');
    Route::get('/zonas/{zona}/edit', 'ZonaController@edit');
    
    Route::post('/zonas', 'ZonaController@storeweb');
    Route::put('/zonas/{zona}', 'ZonaController@updateweb');
    Route::delete('/zonas/{zona}', 'ZonaController@destroyweb');

