<?php

namespace App\Http\Controllers\ApiTecnico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class OrdenesTController extends Controller
{

    public function index(Request $request)
    {    
        $user = $request->user();
        $ordenest = $user->whereIn('Activa', ['atendida', 'cancelada'])->asTecnicoOrdenesTrabajo()
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
        dd($ordenest);
        return $ordenest;
    }   
}
