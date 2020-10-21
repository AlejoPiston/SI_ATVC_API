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
            if ($request->has('dano')){
                $daño = $request->input('dano');
                //Tipo de Daño
                if ($daño == 'Lentitud') {
                    $tipo_daño = 'bajo';
                }elseif ($daño == 'Intermitencia' || $daño == 'Cambio de cable' || $daño == 'Canales') {
                    $tipo_daño = 'medio';

                }else { 
                    $tipo_daño = 'alto';
                }
                //Almacenando datos en variables con lenguaje prolog
                $se_daño = 'fallo('.$tipo_daño.').' . PHP_EOL;
            }else{
                //Almacenando datos en variables con lenguaje prolog
                $se_daño = 'fallo(instalacion).' . PHP_EOL;
            }
            if ($request->has('ficha')){
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
                //Latidud y longitud de la ficha; estos campos deben estar llenos obligatoriamente
                $latitud_cli = $ficha->Latitud;
                $longitud_cli = $ficha->Longitud; 
            }else{
                $latitud_cli = $request->input('Latitud');
                $longitud_cli = $request->input('Longitud');
            }
            
            //Técnicos
            $tecnicos = User::tecnicos()->get();
            //Ordenes de Trabajo
            $ordenes_trabajo = DB::table('users')
                ->join('OrdenTrabajo', 'OrdenTrabajo.IdEmpleado', '=', 'users.id')
                ->select('OrdenTrabajo.Id', 'users.id', 'OrdenTrabajo.Dano', 'OrdenTrabajo.Tipo')
                ->whereIn('Activa', ['confirmada', 'en camino', 'en progreso'])
                //->join('UbicacionOrdenTrabajo', 'volcanos.observatorio_id', '=', 'observatories.id')
                ->get();
            
            if ($ordenes_trabajo->collect([])->isEmpty()) {
                $ot_ordenadas[] = 'ninguna';
            } else {
                //Ordenes de Trabajo ordenadas
                foreach ($ordenes_trabajo as $ot) {

                    if ($ot->Dano == 'Lentitud') {
                        $ot_ordenadas[] = collect($ot)
                                    ->merge(['tiempo' => 30]);
                    } elseif ($ot->Dano == 'Intermitencia' || $ot->Dano == 'Cambio de cable' || $ot->Dano == 'Canales') {
                        $ot_ordenadas[] = collect($ot)
                                    ->merge(['tiempo' => 60]);
                    }elseif (($ot->Dano == null)&&($ot->Tipo == 'instalacion')){
                        $ot_ordenadas[] = collect($ot)
                                    ->merge(['tiempo' => 40]);
                    }
                    else { 
                        $ot_ordenadas[] = collect($ot)
                                    ->merge(['tiempo' => 80]);
                    } 
                }
            }
            

            //Ubicaciones de órdenes de trabajo de los técnicos
            $ubicaciones = DB::table('UbicacionOrdenTrabajo')
                ->join('OrdenTrabajo', 'OrdenTrabajo.Id', '=', 'UbicacionOrdenTrabajo.IdOrdenTrabajo')
                ->select('UbicacionOrdenTrabajo.created_at', 'UbicacionOrdenTrabajo.Latitud', 'UbicacionOrdenTrabajo.Longitud', 'OrdenTrabajo.IdEmpleado')
                //->join('UbicacionOrdenTrabajo', 'volcanos.observatorio_id', '=', 'observatories.id')
                ->orderBy('created_at', 'desc')
                ->get()->unique('IdEmpleado');

                if ($ubicaciones->collect([])->isEmpty()) {
                    $ubicaciones_ordenadas[] = 'ninguna';
                } else {
                    //Ubicaciones ordenadas
                    foreach ($ubicaciones as $ubic) {
                        $ubicaciones_ordenadas[] = $ubic;
                    }
                }
            
            //contador
            $contTecnicos=0;

            if ($tecnicos->collect([])->isEmpty()) {
                $se_id_tecnicos[] = 'ninguna';
                $se_numot_tecnicos[] = 'ninguna';
                $se_mesestrabajo_tecnicos[] = 'ninguna';
                $se_distancia_tecnicos[] = 'ninguna';
                $se_tiempo_ots_tecnicos[] = 'ninguna';

            } else {
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
                        $distancia[$contTecnicos] = -1;//sin_ubicaciones
                    } else {
                        if ($ubicacion_tecnico[$contTecnicos]->Latitud == 'pendiente') {
                            $distancia[$contTecnicos] = -2;//pendiente
                        } else {
                            //Distancia entre ubicación del técnico y domicilio cliente
                            $distancia[$contTecnicos] = $this->distanceCalculation(
                            (Double)$ubicacion_tecnico[$contTecnicos]->Latitud,
                            (Double)$ubicacion_tecnico[$contTecnicos]->Longitud,
                            $latitud_cli,
                            $longitud_cli);
                        }
                    }
                    
    
                    //Almacenando datos en variables con lenguaje prolog
                    $se_id_tecnicos[$contTecnicos] = 'id_tecnico('.$tecnico->id.').' . PHP_EOL;
                    $se_numot_tecnicos[$contTecnicos] = 'num_ot('.$tecnico->id.','.$num_ordenestrabajo[$contTecnicos].').' . PHP_EOL;
                    $se_mesestrabajo_tecnicos[$contTecnicos] = 'meses_trabajo('.$tecnico->id.','.$meses_ordenestrabajo[$contTecnicos].').' . PHP_EOL;
                    $se_distancia_tecnicos[$contTecnicos] = 'distancia('.$tecnico->id.','.$distancia[$contTecnicos].').' . PHP_EOL;
                    $se_tiempo_ots_tecnicos[$contTecnicos] = 'tiempo_ots('.$tecnico->id.','.$añade_tiempo_minutos[$contTecnicos].').' . PHP_EOL;
                    
                    //Almacenando datos en una variable para enviar a excel
                    $datos_aexcel[$contTecnicos] = ['IdTecnico' => $tecnico->id, 
                                                    'Nombre' => ''.$tecnico->name.' '.$tecnico->Apellidos.'',
                                                    'Num_OT' => $num_ordenestrabajo[$contTecnicos],
                                                    'Meses_Tra' => $meses_ordenestrabajo[$contTecnicos],
                                                    'Distancia' => $distancia[$contTecnicos],
                                                    'Tiempo_OTS' => $añade_tiempo_minutos[$contTecnicos]
                                                    ];
    
                    $contTecnicos = $contTecnicos +1;
                    
                }
            }
            
             //Categorizacion de datos
            $categorizacion_num_ot = 'carga_trabajo_ninguna(X) :- num_ot(X,Y), Y = 0.' . PHP_EOL
                        . 'carga_trabajo_leve(X) :- num_ot(X,Y), Y > 0, Y =< 2.' . PHP_EOL
                        . 'carga_trabajo_normal(X) :- num_ot(X,Y), Y > 2, Y =< 5.' . PHP_EOL
                        . 'carga_trabajo_fuerte(X) :- num_ot(X,Y), Y > 5, Y =< 20.' . PHP_EOL;
            $categorizacion_meses_trabajo = 'experiencia_ninguna(X) :- meses_trabajo(X,Y),  Y >= 0, Y =< 2.' . PHP_EOL
                        . 'experiencia_junior(X) :- meses_trabajo(X,Y), Y > 2, Y =< 5.' . PHP_EOL
                        . 'experiencia_senior(X) :- meses_trabajo(X,Y), Y > 5, Y =< 8.' . PHP_EOL
                        . 'experiencia_master(X) :- meses_trabajo(X,Y), Y > 8, Y =< 11.' . PHP_EOL
                        . 'experiencia_profesional(X) :- meses_trabajo(X,Y), Y > 11.' . PHP_EOL;
            $categorizacion_distancia = 'distancia_ninguna(X) :- distancia(X,Y), Y = -1.' . PHP_EOL
                        . 'distancia_pendiente(X) :- distancia(X,Y), Y = -2.' . PHP_EOL
                        . 'distancia_muycorta(X) :- distancia(X,Y), Y >= 0, Y =< 2.' . PHP_EOL
                        . 'distancia_corta(X) :- distancia(X,Y), Y > 2, Y =< 10.' . PHP_EOL
                        . 'distancia_mediana(X) :- distancia(X,Y), Y > 10, Y =< 20.' . PHP_EOL
                        . 'distancia_larga(X) :- distancia(X,Y), Y > 20, Y =< 35.' . PHP_EOL
                        . 'distancia_muylarga(X) :- distancia(X,Y), Y > 35.' . PHP_EOL;     
            $categorizacion_tiempo_ots = 'tiempo_ots_ninguno(X) :- tiempo_ots(X,Y), Y = 0.' . PHP_EOL
                        . 'tiempo_ots_muycorto(X) :- tiempo_ots(X,Y), Y > 0, Y =< 30.' . PHP_EOL
                        . 'tiempo_ots_corto(X) :- tiempo_ots(X,Y), Y > 30, Y =< 60.' . PHP_EOL
                        . 'tiempo_ots_medio(X) :- tiempo_ots(X,Y), Y > 60, Y =< 180.' . PHP_EOL
                        . 'tiempo_ots_largo(X) :- tiempo_ots(X,Y), Y > 180, Y =< 300.' . PHP_EOL   
                        . 'tiempo_ots_muylargo(X) :- tiempo_ots(X,Y), Y > 300.' . PHP_EOL;   
            $reglas = 'optimo1(X):- carga_trabajo_ninguna(X),distancia_ninguna(X).' . PHP_EOL
                        . 'optimo2(X):- carga_trabajo_leve(X),
                                       (distancia_pendiente(X);distancia_muycorta(X);distancia_corta(X)),
                                       (tiempo_ots_muycorto(X);tiempo_ots_corto(X)).' . PHP_EOL
                        . 'optimo3(X):- carga_trabajo_leve(X),
                                       (distancia_pendiente(X);distancia_muycorta(X);distancia_corta(X)),
                                       tiempo_ots_medio(X).' . PHP_EOL
                        . 'optimo4(X):- carga_trabajo_leve(X),
                                       (distancia_mediana(X);distancia_larga(X);distancia_muylarga(X)),
                                       (tiempo_ots_muycorto(X);tiempo_ots_corto(X)).' . PHP_EOL
                        . 'optimo5(X):- carga_trabajo_leve(X),
                                       (distancia_mediana(X);distancia_larga(X);distancia_muylarga(X)),
                                       tiempo_ots_medio(X).' . PHP_EOL
                        . 'optimo6(X):- carga_trabajo_normal(X),
                                       (distancia_pendiente(X);distancia_muycorta(X);distancia_corta(X)),
                                       tiempo_ots_medio(X).' . PHP_EOL
                        . 'optimo7(X):- carga_trabajo_normal(X),
                                       (distancia_pendiente(X);distancia_muycorta(X);distancia_corta(X)),
                                       (tiempo_ots_largo(X);tiempo_ots_muylargo(X)).' . PHP_EOL
                        . 'optimo8(X):- carga_trabajo_normal(X),
                                       (distancia_mediana(X);distancia_larga(X);distancia_muylarga(X)),
                                       tiempo_ots_medio(X).' . PHP_EOL
                        . 'optimo9(X):- carga_trabajo_normal(X),
                                       (distancia_mediana(X);distancia_larga(X);distancia_muylarga(X)),
                                       (tiempo_ots_largo(X);tiempo_ots_muylargo(X)).' . PHP_EOL
                        . 'optimo10(X):- carga_trabajo_fuerte(X),
                                       (distancia_pendiente(X);distancia_muycorta(X);distancia_corta(X)),
                                       tiempo_ots_medio(X).' . PHP_EOL
                        . 'optimo11(X):- carga_trabajo_fuerte(X),
                                       (distancia_pendiente(X);distancia_muycorta(X);distancia_corta(X)),
                                       (tiempo_ots_largo(X);tiempo_ots_muylargo(X)).' . PHP_EOL
                        . 'optimo12(X):- carga_trabajo_fuerte(X),
                                       (distancia_mediana(X);distancia_larga(X);distancia_muylarga(X)),
                                       tiempo_ots_medio(X).' . PHP_EOL
                        . 'optimo13(X):- carga_trabajo_fuerte(X),
                                       (distancia_mediana(X);distancia_larga(X);distancia_muylarga(X)),
                                       (tiempo_ots_largo(X);tiempo_ots_muylargo(X)).' . PHP_EOL;
            $escribeOptimos = 'escribeOptimos([]):- write("").' . PHP_EOL
                        . 'escribeOptimos([Primera|Personas]):- num_ot(Primera, NO),meses_trabajo(Primera, MT),distancia(Primera, D),tiempo_ots(Primera, TOTS),write(Primera),write(","),write(NO),write(","),write(MT),write(","),write(D),write(","),write(TOTS), nl,escribeOptimos(Personas).' . PHP_EOL;
            $consulta_1 = 'consulta_1:- findall(X, optimo1(X), Personas),escribeOptimos(Personas).' . PHP_EOL;
            $consulta_2 = 'consulta_2:- findall(X, optimo2(X), Personas),escribeOptimos(Personas).' . PHP_EOL;
            $consulta_3 = 'consulta_3:- findall(X, optimo3(X), Personas),escribeOptimos(Personas).' . PHP_EOL;
            $consulta_4 = 'consulta_4:- findall(X, optimo4(X), Personas),escribeOptimos(Personas).' . PHP_EOL;
            $consulta_5 = 'consulta_5:- findall(X, optimo5(X), Personas),escribeOptimos(Personas).' . PHP_EOL;
            $consulta_6 = 'consulta_6:- findall(X, optimo6(X), Personas),escribeOptimos(Personas).' . PHP_EOL;
            $consulta_7 = 'consulta_7:- findall(X, optimo7(X), Personas),escribeOptimos(Personas).' . PHP_EOL;
            $consulta_8 = 'consulta_8:- findall(X, optimo8(X), Personas),escribeOptimos(Personas).' . PHP_EOL;
            $consulta_9 = 'consulta_9:- findall(X, optimo9(X), Personas),escribeOptimos(Personas).' . PHP_EOL;
            $consulta_10 = 'consulta_10:- findall(X, optimo10(X), Personas),escribeOptimos(Personas).' . PHP_EOL;
            $consulta_11 = 'consulta_11:- findall(X, optimo11(X), Personas),escribeOptimos(Personas).' . PHP_EOL;
            $consulta_12 = 'consulta_12:- findall(X, optimo12(X), Personas),escribeOptimos(Personas).' . PHP_EOL;
            $consulta_13 = 'consulta_13:- findall(X, optimo13(X), Personas),escribeOptimos(Personas).' . PHP_EOL;

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
                                $categorizacion_tiempo_ots,
                                $reglas, 
                                $escribeOptimos,
                                $consulta_1,
                                $consulta_2,
                                $consulta_3,
                                $consulta_4,
                                $consulta_5,
                                $consulta_6,
                                $consulta_7,
                                $consulta_8,
                                $consulta_9,
                                $consulta_10,
                                $consulta_11,
                                $consulta_12,
                                $consulta_13
                                ];
            // Generando el archivo .pl con todos los hechos y reglas
            file_put_contents('sistema_experto.pl', $sistema_experto);

            $consulta_1_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_1." -t halt.', $output_1);
            $consulta_2_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_2." -t halt.', $output_2);
            $consulta_3_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_3." -t halt.', $output_3);
            $consulta_4_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_4." -t halt.', $output_4);
            $consulta_5_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_5." -t halt.', $output_5);
            $consulta_6_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_6." -t halt.', $output_6);
            $consulta_7_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_7." -t halt.', $output_7);
            $consulta_8_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_8." -t halt.', $output_8);
            $consulta_9_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_9." -t halt.', $output_9);
            $consulta_10_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_10." -t halt.', $output_10);
            $consulta_11_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_11." -t halt.', $output_11);
            $consulta_12_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_12." -t halt.', $output_12);
            $consulta_13_exec = exec('swipl -s C:\laragon\www\SI_ATVC_API\public\sistema_experto.pl -g "consulta_13." -t halt.', $output_13);

            $campos_optimos = collect(['id_tecnico', 'num_ot', 'num_mt', 'distancia', 'tiempo_ots']);
            if (($consulta_1_exec == "")&&($consulta_2_exec == "")&&($consulta_3_exec == "")
                &&($consulta_4_exec == "")&&($consulta_5_exec == "")&&($consulta_6_exec == "")
                &&($consulta_7_exec == "")&&($consulta_8_exec == "")&&($consulta_9_exec == "")
                &&($consulta_10_exec == "")&&($consulta_11_exec == "")&&($consulta_12_exec == "")
                &&($consulta_13_exec == "")) {
                $respuesta[] = "";
            } elseif($consulta_1_exec != "") {
                    foreach ($output_1 as $line) {
                        $json_optimos = $campos_optimos->combine(explode(',', $line));  
                        $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                        $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                    }
            } elseif($consulta_2_exec != "") {
                foreach ($output_2 as $line) {
                    $json_optimos = $campos_optimos->combine(explode(',', $line));  
                    $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                    $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                }
            } elseif($consulta_3_exec != "") {
                foreach ($output_3 as $line) {
                    $json_optimos = $campos_optimos->combine(explode(',', $line));  
                    $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                    $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                }
            } elseif($consulta_4_exec != "") {
                foreach ($output_4 as $line) {
                    $json_optimos = $campos_optimos->combine(explode(',', $line));  
                    $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                    $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                }
            } elseif($consulta_5_exec != "") {
                foreach ($output_5 as $line) {
                    $json_optimos = $campos_optimos->combine(explode(',', $line));  
                    $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                    $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                }
            } elseif($consulta_6_exec != "") {
                foreach ($output_6 as $line) {
                    $json_optimos = $campos_optimos->combine(explode(',', $line));  
                    $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                    $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                }
            } elseif($consulta_7_exec != "") {
                foreach ($output_7 as $line) {
                    $json_optimos = $campos_optimos->combine(explode(',', $line));  
                    $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                    $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                }
            } elseif($consulta_8_exec != "") {
                foreach ($output_8 as $line) {
                    $json_optimos = $campos_optimos->combine(explode(',', $line));  
                    $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                    $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                }
            } elseif($consulta_9_exec != "") {
                foreach ($output_9 as $line) {
                    $json_optimos = $campos_optimos->combine(explode(',', $line));  
                    $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                    $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                }
            } elseif($consulta_10_exec != "") {
                foreach ($output_10 as $line) {
                    $json_optimos = $campos_optimos->combine(explode(',', $line));  
                    $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                    $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                }
            } elseif($consulta_11_exec != "") {
                foreach ($output_11 as $line) {
                    $json_optimos = $campos_optimos->combine(explode(',', $line));  
                    $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                    $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                }
            } elseif($consulta_12_exec != "") {
                foreach ($output_12 as $line) {
                    $json_optimos = $campos_optimos->combine(explode(',', $line));  
                    $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                    $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                }
            } elseif($consulta_13_exec != "") {
                foreach ($output_13 as $line) {
                    $json_optimos = $campos_optimos->combine(explode(',', $line));  
                    $tec = User::tecnicos()->findOrFail($json_optimos['id_tecnico']);
                    $respuesta[] = $json_optimos->merge(['Nombre' => ''.$tec->name.' '.$tec->Apellidos]);                              
                }
            } 
            
            
            
            //Exportando a excel
            //$export = $this->export_excel($datos_aexcel);

        return $respuesta;
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

    protected function export_excel($datos) {

        $fecha_actual = Carbon::now();
        $filename = 'SistemaExperto_' . $fecha_actual . '.xls'; 
        
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=\"$filename\"");

        
        $isPrintHeader = false;

        foreach ($datos as $row) {

            if (! $isPrintHeader ) {

                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;

            }

            echo implode("\t", array_values($row)) . "\n";

        }

        exit();

    }
}
