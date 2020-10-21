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
        Route::get('/reportes/ot/ubicaciones', 'ReporteController@ordenestrabajoUbicaciones');
        Route::get('/reportes/ot/ubicaciones/data', 'ReporteController@mapMarker');
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

         Route::get('/orden_trabajos/ver/{orden_trabajo}', 'OrdenTrabajoController@showweb');

         Route::get('/orden_trabajos/create', 'OrdenTrabajoController@create');
         
         Route::get('/orden_trabajos/{orden_trabajo}/cancelar', 'OrdenTrabajoController@showCancelForm');
         Route::post('/orden_trabajos/{orden_trabajo}/cancelar', 'OrdenTrabajoController@postCancel');

         Route::post('/orden_trabajos/{orden_trabajo}/confirmar', 'OrdenTrabajoController@postConfirm');

         Route::post('/orden_trabajos/{orden_trabajo}/atender', 'OrdenTrabajoController@postAtender');
         Route::post('/orden_trabajos/{orden_trabajo}/solucionar', 'OrdenTrabajoController@postSolucionar');

         Route::get('/orden_trabajos/{orden_trabajo}/finalizar', 'OrdenTrabajoController@showFinalizarForm');
         Route::post('/orden_trabajos/{orden_trabajo}/finalizar', 'OrdenTrabajoController@postFinalizar');
         
        

        Route::get('/orden_trabajos/pendientes', 'OrdenTrabajoController@indexweb');
        Route::get('/orden_trabajos/confirmadas', 'OrdenTrabajoController@indexweb');
        Route::get('/orden_trabajos/encamino', 'OrdenTrabajoController@indexweb');
        Route::get('/orden_trabajos/enprogreso', 'OrdenTrabajoController@indexweb');
        Route::get('/orden_trabajos/historial', 'OrdenTrabajoController@indexweb');
        
        Route::get('/orden_trabajos/{id}/ficha', 'OrdenTrabajoController@getficha');
        Route::get('/orden_trabajos/tecnico/se', 'SistemaExpertoController@gettecnico');


        // Instalaciones
        Route::get('/instalaciones', 'InstalacionController@indexweb');
        Route::get('/instalaciones/pendientes', 'InstalacionController@indexweb');
        Route::get('/instalaciones/confirmadas', 'InstalacionController@indexweb');
        Route::get('/instalaciones/encamino', 'InstalacionController@indexweb');
        Route::get('/instalaciones/enprogreso', 'InstalacionController@indexweb');
        Route::get('/instalaciones/historial', 'InstalacionController@indexweb');

        Route::get('/instalaciones/create', 'InstalacionController@create');
        Route::post('/instalaciones', 'InstalacionController@storeweb');
        Route::get('/instalaciones/ver/{orden_trabajo}', 'InstalacionController@showweb');
        Route::post('/instalaciones/{orden_trabajo}/atender', 'InstalacionController@postAtender');
        Route::get('/instalaciones/{orden_trabajo}/cancelar', 'InstalacionController@showCancelForm');
        Route::post('/instalaciones/{orden_trabajo}/cancelar', 'InstalacionController@postCancel');
        Route::post('/instalaciones/{orden_trabajo}/solucionar', 'InstalacionController@postSolucionar');
        Route::get('/instalaciones/{orden_trabajo}/finalizar', 'InstalacionController@showFinalizarForm');
        Route::post('/instalaciones/{orden_trabajo}/finalizar', 'InstalacionController@postFinalizar');

        //Perfil
        Route::get('/perfil/{id_user}', 'HomeController@perfil');
        Route::get('/perfil/{id_user}/edit', 'HomeController@edit');
        Route::put('/perfil/{id_user}', 'HomeController@update');







        

         
});


    
    
    //Zona
    Route::get('/zonas', 'ZonaController@indexweb');
    Route::get('/zonas/create', 'ZonaController@create');
    Route::get('/zonas/{zona}/edit', 'ZonaController@edit');
    
    Route::post('/zonas', 'ZonaController@storeweb');
    Route::put('/zonas/{zona}', 'ZonaController@updateweb');
    Route::delete('/zonas/{zona}', 'ZonaController@destroyweb');

