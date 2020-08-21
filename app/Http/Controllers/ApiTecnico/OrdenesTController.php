<?php

namespace App\Http\Controllers\ApiTecnico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class OrdenesTController extends Controller
{

    public function index(Request $request)
    {    
        $user = $request->user();
        $ordenest = $user->asTecnicoOrdenesTrabajo()->whereIn('Activa', ['atendida', 'cancelada'])
            ->with([
                'fichaordentrabajo' => function ($query) {
                    $query->select('Id', 'Nombres', 'Apellidos');
                },
                  
                ])
                ->get([
                    "Id",
                    "Fecha",
                    "Dano",
                    "Resultado",
                    "Activa",
                    "FechaHoraArrivo",
                    "FechaHoraSalida",
                    "IdFicha",
                    "IdTurno",
                    "IdUsuario",
                    "IdCliente",
                    "created_at"
                ]);
        return $ordenest;
    }   
    public function indexc(Request $request)
    {    
        $user = $request->user();
        $ordenest = $user->asTecnicoOrdenesTrabajo()->where('Activa', 'confirmada')
            ->with([
                'fichaordentrabajo' => function ($query) {
                    $query->select('Id', 'Nombres', 'Apellidos');
                },
                  
                ])
                ->get([
                    "Id",
                    "Fecha",
                    "Dano",
                    "Resultado",
                    "Activa",
                    "FechaHoraArrivo",
                    "FechaHoraSalida",
                    "IdFicha",
                    "IdTurno",
                    "IdUsuario",
                    "IdCliente",
                    "created_at"
                ]);
        return $ordenest;
    }  
    public function indexp(Request $request)
    {    
        $user = $request->user();
        $ordenest = $user->asTecnicoOrdenesTrabajo()->where('Activa', 'en progreso')
            ->with([
                'fichaordentrabajo' => function ($query) {
                    $query->select('Id', 'Nombres', 'Apellidos');
                },
                  
                ])
                ->get([
                    "Id",
                    "Fecha",
                    "Dano",
                    "Resultado",
                    "Activa",
                    "FechaHoraArrivo",
                    "FechaHoraSalida",
                    "IdFicha",
                    "IdTurno",
                    "IdUsuario",
                    "IdCliente",
                    "created_at"
                ]);
        return $ordenest;
    }  
}
