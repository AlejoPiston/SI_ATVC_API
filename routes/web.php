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

        //Reportes
        Route::get('/reportes/ot/linea', 'ReporteController@ordenestrabajoLinea');
        Route::get('/reportes/tecnicos/columna', 'ReporteController@tecnicosColumna');
        Route::get('/reportes/tecnicos/columna/data', 'ReporteController@tecnicosJson');
        
        //FCM
        Route::post('/fcm/send', 'FirebaseController@sendAll');

});
Route::middleware(['auth', 'cliente'])->group(function () {

    
});


Route::middleware('auth')->group(function () {

         // Orden de Trabajo
         Route::get('/orden_trabajos', 'OrdenTrabajoController@indexweb');

         
         Route::post('/orden_trabajos', 'OrdenTrabajoController@storeweb');

         Route::get('/orden_trabajos/{orden_trabajos}/edit', 'OrdenTrabajoController@edit');

         Route::get('/orden_trabajos/ver/{orden_trabajo}', 'OrdenTrabajoController@showweb');

         Route::get('/orden_trabajos/create', 'OrdenTrabajoController@create');
         
         Route::get('/orden_trabajos/{orden_trabajo}/cancelar', 'OrdenTrabajoController@showCancelForm');
         Route::post('/orden_trabajos/{orden_trabajo}/cancelar', 'OrdenTrabajoController@postCancel');

         Route::post('/orden_trabajos/{orden_trabajo}/confirmar', 'OrdenTrabajoController@postConfirm');

        

         
});


    
    
    //Zona
    Route::get('/zonas', 'ZonaController@indexweb');
    Route::get('/zonas/create', 'ZonaController@create');
    Route::get('/zonas/{zona}/edit', 'ZonaController@edit');
    
    Route::post('/zonas', 'ZonaController@storeweb');
    Route::put('/zonas/{zona}', 'ZonaController@updateweb');
    Route::delete('/zonas/{zona}', 'ZonaController@destroyweb');

