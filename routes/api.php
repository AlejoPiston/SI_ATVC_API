<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResources([
    'zonas' => 'ZonaController',
    'servicios' => 'ServicioController',
    'valor_adicionals' => 'ValorAdicionalController',
    'fichas' => 'FichaController',
    'material_instalacions' => 'MaterialInstalacionController',
    'mensualidads' => 'MensualidadController'    
]);

