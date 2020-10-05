<?php

namespace App\Http\Controllers;
use App\Ficha;
use App\User;
use App\UbicacionOrdenTrabajo;

use Illuminate\Http\Request;

class SistemaExpertoController extends Controller
{

    public function gettecnico(Request $request)
    {
        //Base de hechos
            //Datos de entrada
            $date = $request->input('date');
            $dano = $request->input('dano');
            $idficha = $request->input('ficha');
            //Consulta en la base de datos
            //Ficha
            $ficha = Ficha::where('Id', $idficha)->with([
                'zonaficha' => function ($query) {
                    $query->select('Id', 'Nombre');
                },
                'servicioficha' => function ($query) {
                    $query->select('Id', 'Nombre');
                },
                'usuarioficha' => function ($query) {
                    $query->select('id', 'name');
                },
                  
                ])
                ->first();
            //Técnicos
            $tecnicos = User::tecnicos()->get();
            
            //Ubicaciones
            $ubicaciones = UbicacionOrdenTrabajo::with([
                'ordentrabajoubicacion' => function ($query) {
                    $query->select('Id','IdEmpleado');
                },
                ])
                ->get();
            $ubicacionTecnicoA = UbicacionOrdenTrabajo::with([
                'ordentrabajoubicacion' => function ($query) {
                    $query->select('Id','IdEmpleado');
                },
                ])
                ->where('IdOrdenTrabajo', 1)
                ->latest()
                ->first();
            $ubicacionTecnicoB = UbicacionOrdenTrabajo::with([
                'ordentrabajoubicacion' => function ($query) {
                    $query->select('Id','IdEmpleado');
                },
                ])
                ->where('IdOrdenTrabajo', 3)
                ->latest()
                ->first();
            //Órdenes de Trabajo de cada técnico
            $tecnicoA = User::tecnicos()->findOrFail($ubicacionTecnicoA->ordentrabajoubicacion->IdEmpleado);
            $tecnicoB = User::tecnicos()->findOrFail($ubicacionTecnicoB->ordentrabajoubicacion->IdEmpleado);

            $ordenestA = $tecnicoA->asTecnicoOrdenesTrabajo()->get()->count();
            $ordenestB = $tecnicoB->asTecnicoOrdenesTrabajo()->get()->count();

            //Distancia entre ubicación del técnico y domicilio cliente
            $distancia = $this->distanceCalculation(
                $ubicacionTecnicoA->Latitud,
                $ubicacionTecnicoA->Longitud,
                $ubicacionTecnicoB->Latitud,
                $ubicacionTecnicoB->Longitud);
            
        //Maquina de inferencia
        if($distancia<1)
                $rangoDistancia='muy cerca';
        elseif($distancia>1)
                $rangoDistancia='cerca';
        //Base de conocimientos

        //Regla 1:

        //Regla 2:
        
        return $rangoDistancia;

    }
    public function gettecnicoprolog(Request $request)
    {
        
        return view ('OrdenTrabajo.sistemaexperto');
        

    }
    protected function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
        // Cálculo de la distancia en grados
        $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
    
        // Conversión de la distancia en grados a la unidad escogida (kilómetros, millas o millas naúticas)
        switch($unit) {
            case 'km':
                $distance = $degrees * 111.13384; // 1 grado = 111.13384 km, basándose en el diametro promedio de la Tierra (12.735 km)
                break;
            case 'mi':
                $distance = $degrees * 69.05482; // 1 grado = 69.05482 millas, basándose en el diametro promedio de la Tierra (7.913,1 millas)
                break;
            case 'nmi':
                $distance =  $degrees * 59.97662; // 1 grado = 59.97662 millas naúticas, basándose en el diametro promedio de la Tierra (6,876.3 millas naúticas)
        }
        return round($distance, $decimals);
    }
}
