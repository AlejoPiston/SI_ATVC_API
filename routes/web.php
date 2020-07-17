<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Orden de Trabajo
Route::get('/orden_trabajos', 'OrdenTrabajoController@indexweb');
Route::get('/orden_trabajos/create', 'OrdenTrabajoController@create');
Route::get('/orden_trabajos/{orden_trabajos}/edit', 'OrdenTrabajoController@edit');
Route::post('/orden_trabajos', 'OrdenTrabajoController@storeweb');

//Zona
Route::get('/zonas', 'ZonaController@indexweb');
Route::get('/zonas/create', 'ZonaController@create');
Route::get('/zonas/{zonas}/edit', 'ZonaController@edit');
Route::post('/zonas', 'ZonaController@storeweb');