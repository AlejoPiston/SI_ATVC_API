<?php

namespace App\Http\Controllers;
use App\Ficha;
use App\User;
use App\UbicacionOrdenTrabajo;
use App\OrdenTrabajo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SistemaExpertoController extends Controller
{

    public function gettecnico(Request $request)
    {
        //Base de hechos
            //Datos de entrada
            $date = $request->input('date');
            $daño = $request->input('dano');
            $idficha = $request->input('ficha');

            //Tipo de Daño
            if ($daño == 'Lentitud') {
                $tipo_daño = 'bajo';
            }elseif ($daño == 'Intermitencia' || $daño == 'Cambio de cable' || $daño == 'Canales') {
                $tipo_daño = 'medio';

            }else { 
                $tipo_daño = 'alto';
            }
            
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
            //Latidud y longitud de la ficha; estos campos deben estar llenos obligatoriamente
             $ficha->Latitud;
             $ficha->Longitud;       

            //Técnicos
            $tecnicos = User::tecnicos()->get();
            //Ordenes de Trabajo
            $ordenes_trabajo = DB::table('users')
                ->join('OrdenTrabajo', 'OrdenTrabajo.IdEmpleado', '=', 'users.id')
                ->select('OrdenTrabajo.Id', 'users.id', 'OrdenTrabajo.Dano')
                ->whereIn('Activa', ['confirmada', 'en camino', 'en progreso'])
                //->join('UbicacionOrdenTrabajo', 'volcanos.observatorio_id', '=', 'observatories.id')
                ->get();
            //Ordenes de Trabajo ordenadas
            foreach ($ordenes_trabajo as $ot) {
                if ($ot->Dano == 'Lentitud') {
                    $ot_ordenadas[] = collect($ot)
                                  ->merge(['tiempo' => 30]);
                } elseif ($ot->Dano == 'Intermitencia' || $ot->Dano == 'Cambio de cable' || $ot->Dano == 'Canales') {
                    $ot_ordenadas[] = collect($ot)
                                  ->merge(['tiempo' => 60]);
                }else { 
                    $ot_ordenadas[] = collect($ot)
                                  ->merge(['tiempo' => 80]);
                }
            }
           
            


            //Ubicaciones de órdenes de trabajo de los técnicos
            $ubicaciones = DB::table('UbicacionOrdenTrabajo')
                ->join('OrdenTrabajo', 'OrdenTrabajo.Id', '=', 'UbicacionOrdenTrabajo.IdOrdenTrabajo')
                ->select('UbicacionOrdenTrabajo.created_at', 'UbicacionOrdenTrabajo.Latitud', 'UbicacionOrdenTrabajo.Longitud', 'OrdenTrabajo.IdEmpleado')
                //->join('UbicacionOrdenTrabajo', 'volcanos.observatorio_id', '=', 'observatories.id')
                ->orderBy('created_at', 'desc')
                ->get()->unique('IdEmpleado');

            //Ubicaciones ordenadas
            foreach ($ubicaciones as $ubic) {
                $ubicaciones_ordenadas[] = $ubic;
            }
            
            //contador
            
            $contTecnicos=0;
            
            foreach ($tecnicos as $tecnico) {
                
                //Tiempo estimado de solución a lista de ordenes de trabajo
                $añade_tiempo_minutos[$contTecnicos] = collect($ot_ordenadas)
                                                  ->where('id', $tecnico->id)
                                                  ->sum('tiempo');
    
                //Número de órdenes de trabajo de los técnicos
                $num_ordenestrabajo[$contTecnicos] = $tecnico->asTecnicoOrdenesTrabajo()
                                ->whereIn('Activa', ['confirmada', 'en camino', 'en progreso'])
                                ->get()
                                ->count();
                //Meses de trabajo de los técnicos
                $fecha_registro_tecnico = $tecnico->created_at;
                $fecha_actual = Carbon::now();
                $meses_ordenestrabajo[$contTecnicos] = $fecha_registro_tecnico->diffInMonths($fecha_actual);
                
                
                $ubicacion_tecnico[$contTecnicos] = collect($ubicaciones_ordenadas)->where('IdEmpleado', $tecnico->id)->first();

                if ($ubicacion_tecnico[$contTecnicos] == null) {
                    $distancia[$contTecnicos] = 0;
                } else {
                    if ($ubicacion_tecnico[$contTecnicos]->Latitud == 'pendiente') {
                        $distancia[$contTecnicos] = 'pendiente';
                    } else {
                        //Distancia entre ubicación del técnico y domicilio cliente
                        $distancia[$contTecnicos] = $this->distanceCalculation(
                        (Double)$ubicacion_tecnico[$contTecnicos]->Latitud,
                        (Double)$ubicacion_tecnico[$contTecnicos]->Longitud,
                        $ficha->Latitud,
                        $ficha->Longitud);
                    }
                }
                

                //Almacenando datos en variables con lenguaje prolog
                $se_id_tecnicos[$contTecnicos] = 'id_tecnico('.$tecnico->id.').' . PHP_EOL;
                $se_numot_tecnicos[$contTecnicos] = 'num_ot('.$tecnico->id.','.$num_ordenestrabajo[$contTecnicos].').' . PHP_EOL;
                $se_mesestrabajo_tecnicos[$contTecnicos] = 'meses_trabajo('.$tecnico->id.','.$meses_ordenestrabajo[$contTecnicos].').' . PHP_EOL;
                $se_distancia_tecnicos[$contTecnicos] = 'distancia('.$tecnico->id.','.$distancia[$contTecnicos].').' . PHP_EOL;
                $se_tiempo_ots_tecnicos[$contTecnicos] = 'tiempo_ots('.$tecnico->id.','.$añade_tiempo_minutos[$contTecnicos].').' . PHP_EOL;
                
                $contTecnicos = $contTecnicos +1;
                
            }   
            //Almacenando datos en variables con lenguaje prolog
            $se_daño = 'fallo('.$tipo_daño.').' . PHP_EOL;

             //Categorizacion de datos
            $categorizacion_num_ot = 'carga_trabajo_ninguna(X) :- num_ot(X,Y), Y = 0.' . PHP_EOL
                        . 'carga_trabajo_leve(X) :- num_ot(X,Y), Y > 0, Y =< 2.' . PHP_EOL
                        . 'carga_trabajo_normal(X) :- num_ot(X,Y), Y > 2, Y =< 5.' . PHP_EOL
                        . 'carga_trabajo_fuerte(X) :- num_ot(X,Y), Y > 5, Y =< 20.' . PHP_EOL;
            $categorizacion_meses_trabajo = 'experiencia_ninguna(X) :- meses_trabajo(X,Y),  Y > 0, Y =< 2.' . PHP_EOL
                        . 'experiencia_junior(X) :- meses_trabajo(X,Y), Y > 2, Y =< 5.' . PHP_EOL
                        . 'experiencia_senior(X) :- meses_trabajo(X,Y), Y > 5, Y =< 8.' . PHP_EOL
                        . 'experiencia_master(X) :- meses_trabajo(X,Y), Y > 8, Y =< 11.' . PHP_EOL
                        . 'experiencia_profesional(X) :- meses_trabajo(X,Y), Y > 11.' . PHP_EOL;
            $categorizacion_distancia = 'distancia_muycorta(X) :- distancia(X,Y), Y >= 0, Y =< 2.' . PHP_EOL
                        . 'distancia_corta(X) :- distancia(X,Y), Y > 2, Y =< 10.' . PHP_EOL
                        . 'distancia_mediana(X) :- distancia(X,Y), Y > 10, Y =< 20.' . PHP_EOL
                        . 'distancia_larga(X) :- distancia(X,Y), Y > 20, Y =< 35.' . PHP_EOL
                        . 'distancia_muylarga(X) :- distancia(X,Y), Y > 35.' . PHP_EOL
                        . 'distancia_pendiente(X) :- distancia(X,Y), Y = pendiente.' . PHP_EOL;   
            $categorizacion_tiempo_ots = 'tiempo_ots_ninguno(X) :- tiempo_ots(X,Y), Y = 0.' . PHP_EOL
                        . 'tiempo_ots_muycorto(X) :- tiempo_ots(X,Y), Y > 0, Y =< 30.' . PHP_EOL
                        . 'tiempo_ots_corto(X) :- tiempo_ots(X,Y), Y > 30, Y =< 60.' . PHP_EOL
                        . 'tiempo_ots_medio(X) :- tiempo_ots(X,Y), Y > 60, Y =< 180.' . PHP_EOL
                        . 'tiempo_ots_largo(X) :- tiempo_ots(X,Y), Y > 180, Y =< 300.' . PHP_EOL   
                        . 'tiempo_ots_muylargo(X) :- tiempo_ots(X,Y), Y > 300.' . PHP_EOL;   


            //Almacenando todos los hechos y reglas en una sola variable 
            $sistema_experto = [
                                implode('', $se_id_tecnicos),
                                $se_daño,
                                implode('', $se_numot_tecnicos),
                                implode('', $se_mesestrabajo_tecnicos),
                                implode('', $se_distancia_tecnicos),
                                implode('', $se_tiempo_ots_tecnicos),
                                $categorizacion_num_ot,
                                $categorizacion_meses_trabajo,
                                $categorizacion_distancia,
                                $categorizacion_tiempo_ots
                                ];
            // Generando el archivo .pl con todos los hechos y reglas
            file_put_contents('sistema_experto.pl', $sistema_experto);

        return $sistema_experto;
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
