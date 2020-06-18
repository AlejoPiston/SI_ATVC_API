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
    'mensualidads' => 'MensualidadController',
    'usuarios' => 'UsuarioController',
    'gastos' => 'UsuarioController',
    'otro_ingresos' => 'UsuarioController',
    'cierre_cajas' => 'CierreCajaController',
    'cobros' => 'CobroController',
    'retencions' => 'RetencionController',
    'cobro_mensualidads' => 'CobroMensualidadController',  
    'compromiso_pagos' => 'CompromisoPagoController',
    'corte_reconexions' => 'CorteReconexionController',
    'turno_orden_trabajos' => 'TurnoOrdenTrabajoController',
    'orden_trabajos' => 'OrdenTrabajoController'
]);

