<?php

namespace App\Http\Controllers\ApiTecnico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OrdenTrabajo;
use App\UbicacionOrdenTrabajo;
use App\CancelacionOrdenTrabajo;


class OrdenesTController extends Controller
{

    public function index(Request $request)
    {    
        $user = $request->user();
        $ordenest = $user->asTecnicoOrdenesTrabajo()->whereIn('Activa', ['atendida', 'cancelada'])
            ->with([
                'fichaordentrabajo' => function ($query) {
                    $query->select('Id', 'Nombres', 'Apellidos', 'DireccionDomicilio', 'TelefonoDomicilio');
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
                    "created_at",
                    "updated_at"
                ]);
                
        return $ordenest;
    }   
    public function indexc(Request $request)
    {    
        $user = $request->user();
        $ordenest = $user->asTecnicoOrdenesTrabajo()->where('Activa', 'confirmada')
            ->with([
                'fichaordentrabajo' => function ($query) {
                    $query->select('Id', 'Nombres', 'Apellidos', 'DireccionDomicilio', 'TelefonoDomicilio');
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
    public function indexca(Request $request)
    {    
        $user = $request->user();
        $ordenest = $user->asTecnicoOrdenesTrabajo()->where('Activa', 'en camino')
            ->with([
                'fichaordentrabajo' => function ($query) {
                    $query->select('Id', 'Nombres', 'Apellidos', 'DireccionDomicilio', 'TelefonoDomicilio');
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
                    $query->select('Id', 'Nombres', 'Apellidos', 'DireccionDomicilio', 'TelefonoDomicilio');
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

    public function storec(Request $request)
    {
        $ordentrabajo = OrdenTrabajo::findOrFail($request->Id);

        //$ordentrabajo = OrdenTrabajo::where('Id', $request->Id)->get();
        $ubicacion = new UbicacionOrdenTrabajo();
        $ubicacion->Latitud = $request->Latitud;
        $ubicacion->Longitud = $request->Longitud;
        $ubicacion->EstadoOrdenTrabajo = $request->Activa;
        $ubicacion->IdOrdenTrabajo = $ordentrabajo->Id;
        $ubicacion->save();
        $ordentrabajo->Activa = $request->Activa;
        $ordentrabajo->Resultado = $request->Resultado;
        $ordentrabajo->save();
        return $ordentrabajo;
    }
    public function storecan(Request $request)
    {
        $ordentrabajo = OrdenTrabajo::findOrFail($request->Id);

        //$ordentrabajo = OrdenTrabajo::where('Id', $request->Id)->get();
        $ubicacion = new UbicacionOrdenTrabajo();

        $ubicacion->Latitud = $request->Latitud;
        $ubicacion->Longitud = $request->Longitud;
        $ubicacion->EstadoOrdenTrabajo = $request->Activa;
        $ubicacion->IdOrdenTrabajo = $ordentrabajo->Id;
        $ubicacion->save();

        $cancelacion = new CancelacionOrdenTrabajo();

        $cancelacion->Justificacion = $request->Justificacion;
        $cancelacion->Cancelado_por = $request->user()->id;
        $ordentrabajo->cancelacion()->save($cancelacion);
        $ordentrabajo->Activa = $request->Activa;
        $ordentrabajo->save();
        return $ordentrabajo;
    }
}
