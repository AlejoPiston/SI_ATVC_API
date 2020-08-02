<?php

namespace App\Http\Controllers;

use App\OrdenTrabajo;
use App\Ficha;
use App\User;
use Illuminate\Http\Request;

class OrdenTrabajoController extends Controller
{

    public function indexweb()
    {
        $Tipo = auth()->user()->Tipo;

        if($Tipo == 'administrador'){

            $ordenestrabajos_pendientes = OrdenTrabajo::where('Activa', 'registrada')
                ->paginate(5);
            $ordenestrabajos_enprogreso = OrdenTrabajo::where('Activa', 'en progreso')
                ->paginate(5);

        } elseif($Tipo == 'tecnico'){

            $ordenestrabajos_pendientes = OrdenTrabajo::where('Activa', 'pendiente')
                ->where('IdEmpleado', auth()->id())
                ->paginate(5);
            $ordenestrabajos_enprogreso = OrdenTrabajo::where('Activa', 'en progreso')
                ->where('IdEmpleado', auth()->id())
                ->paginate(5);

        } elseif($Tipo == 'cliente') {

            $ordenestrabajos_pendientes = OrdenTrabajo::where('Activa', 'registrada')
                ->where('IdUsuario', auth()->id())
                ->paginate(5);
            $ordenestrabajos_enprogreso = OrdenTrabajo::where('Activa', 'en progreso')
                ->where('IdUsuario', auth()->id())
                ->paginate(5);

        }
        return view ('OrdenTrabajo.lista',
             compact('ordenestrabajos_pendientes', 'ordenestrabajos_enprogreso', 'Tipo')
        );

    }
    public function create()
    {
        $clientes = Ficha::all();
        $tecnicos = User::tecnicos()->get();
        return view ('OrdenTrabajo.create', compact('clientes', 'tecnicos'));

    }
    public function storeweb(Request $request)
    {
        //
        $rules = [
            'Dano' => 'required|min:3'
        ];
        $this->validate($request, $rules);


        $Tipo = auth()->user()->Tipo;
        $idUsuario = auth()->user()->id;

        if($Tipo == 'administrador'){

            OrdenTrabajo::create(
                $request->only('Fecha', 
                               'Dano', 
                               'Resultado', 
                               'FechaHoraArrivo', 
                               'FechaHoraSalida', 
                               'IdFicha',
                               'IdTurno', 
                               'IdEmpleado')
                + [
                    'IdUsuario' => $idUsuario,
                    'Activa' => 'pendiente'
                ]
            );

        } elseif($Tipo == 'cliente') {

            OrdenTrabajo::create(
                $request->only('Fecha', 
                               'Dano', 
                               'Resultado', 
                               'FechaHoraArrivo', 
                               'FechaHoraSalida', 
                               'IdFicha',
                               'IdTurno', 
                               'IdEmpleado')
                + [
                    'IdUsuario' => $idUsuario,
                    'Activa' => 'registrada'
                ]
            );

        }

        $notificacion = 'La orden de trabajo se ha registrado correctamente';
        return redirect('/orden_trabajos')->with(compact('notificacion'));

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrdenTrabajo::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return OrdenTrabajo::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show(OrdenTrabajo $ordenTrabajo)
    {
        return $ordenTrabajo;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdenTrabajo $ordenTrabajo)
    {
        $ordenTrabajo->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenTrabajo $ordenTrabajo)
    {
        $ordenTrabajo->delete();

    }
}
