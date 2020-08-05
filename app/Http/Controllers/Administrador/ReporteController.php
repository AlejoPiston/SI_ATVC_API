<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\OrdenTrabajo;
use App\User;
use DB;

class ReporteController extends Controller
{
    public function ordenestrabajoLinea(){
        
        $cantidades_meses = OrdenTrabajo::select
        ( 
            DB::raw('MONTH(created_at) as month'),    
            DB::raw('COUNT(1) as count')
        )
            ->groupBy(DB::raw('MONTH(created_at)'))->get()->toArray();
       
        $contadores = array_fill(0, 12, 0);
        foreach($cantidades_meses as $cm){
            $index = $cm['month']-1;
            $contadores[$index] = (int)$cm['count'];
        }
        return view('Reportes.ot_linea', compact('contadores'));
    }

    public function tecnicosColumna(){
        
        return view('Reportes.tecnicos_columna');
    }
    public function tecnicosJson(){

        $tecnicos = User::tecnicos()
            ->select('name')
            ->withCount([
                'atendidasOrdenesTrabajo',
                'canceladasOrdenesTrabajo'])
            ->orderBy('atendidas_ordenes_trabajo_count', 'desc')
            ->take(3)
            ->get();
            
        $data = [];
        $data['categories'] = $tecnicos->pluck('name');
        
        $series = [];

        $series1['name'] = 'ordenes de trabajo atendidas';
        $series1['data'] = $tecnicos->pluck('atendidas_ordenes_trabajo_count');

        $series2['name'] = 'ordenes de trabajo canceladas';
        $series2['data'] = $tecnicos->pluck('canceladas_ordenes_trabajo_count');
        $series[] = $series1;
        $series[] = $series2;
        
        $data['series'] = $series;

        return $data;
    }
}
