<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\OrdenTrabajo;
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
}
