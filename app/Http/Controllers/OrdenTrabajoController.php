<?php

namespace App\Http\Controllers;

use App\OrdenTrabajo;
use App\CancelacionOrdenTrabajo;
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
               //dd($ordenestrabajos_pendientes);
               //->paginate(5, ['*'], 'pendientes');

            $ordenestrabajos_confirmadas = OrdenTrabajo::where('Activa', 'confirmada')
                ->paginate(5);
                //dd($ordenestrabajos_confirmadas);
                //dd($ordenestrabajos_confirmadas->url($ordenestrabajos_confirmadas->currentPage()));

            $ordenestrabajos_enprogreso = OrdenTrabajo::where('Activa', 'en progreso')
                ->paginate(5);
            
            $ordenestrabajos_historial = OrdenTrabajo::whereIn('Activa', ['atendida', 'cancelada'])
                ->paginate(5);

        } elseif($Tipo == 'tecnico'){

            $ordenestrabajos_pendientes = OrdenTrabajo::where('Activa', 'registrada')
                ->where('IdEmpleado', auth()->id())
                ->paginate(5);
            $ordenestrabajos_confirmadas = OrdenTrabajo::where('Activa', 'confirmada')
                ->where('IdEmpleado', auth()->id())
                ->paginate(5);
            $ordenestrabajos_enprogreso = OrdenTrabajo::where('Activa', 'en progreso')
                ->where('IdEmpleado', auth()->id())
                ->paginate(5);
            $ordenestrabajos_historial = OrdenTrabajo::whereIn('Activa', ['atendida', 'cancelada'])
                ->where('IdEmpleado', auth()->id())
                ->paginate(5);

        } elseif($Tipo == 'cliente') {

            $ordenestrabajos_pendientes = OrdenTrabajo::where('Activa', 'registrada')
                ->where('IdCliente', auth()->id())
                ->paginate(5);
            $ordenestrabajos_confirmadas = OrdenTrabajo::where('Activa', 'confirmada')
                ->where('IdCliente', auth()->id())
                ->paginate(5);
            $ordenestrabajos_enprogreso = OrdenTrabajo::where('Activa', 'en progreso')
                ->where('IdCliente', auth()->id())
                ->paginate(5);
            $ordenestrabajos_historial = OrdenTrabajo::whereIn('Activa', ['atendida', 'cancelada'])
                ->where('IdCliente', auth()->id())
                ->paginate(5);

        }
        return view ('OrdenTrabajo.lista',
             compact('ordenestrabajos_pendientes', 'ordenestrabajos_confirmadas', 
             'ordenestrabajos_enprogreso', 'ordenestrabajos_historial', 'Tipo')
        );

    }
    public function create()
    {
        $fichas = Ficha::all();
        $tecnicos = User::tecnicos()->get();
        $clientes = User::clientes()->get();
        return view ('OrdenTrabajo.create', compact('fichas', 'tecnicos', 'clientes'));

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
                               'IdCliente',
                               'IdEmpleado')
                + [
                    'IdUsuario' => $idUsuario,
                    'Activa' => 'confirmada'
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
                               'IdCliente',
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

    public function showCancelForm(OrdenTrabajo $ordenTrabajo)
    {
        if ($ordenTrabajo->Activa == 'confirmada')
            return view ('OrdenTrabajo.cancelar', compact('ordenTrabajo'));

        return redirect('/orden_trabajos');  

    }

    public function postCancel(OrdenTrabajo $ordenTrabajo, Request $request)
    {
        if ($request->has('Justificacion'))
            $cancelacion = new CancelacionOrdenTrabajo();
            $cancelacion->Justificacion = $request->input('Justificacion');
            $cancelacion->Cancelado_por = auth()->id();
            $ordenTrabajo->cancelacion()->save($cancelacion);

        $ordenTrabajo->Activa = 'cancelada';
        $saved = $ordenTrabajo->save();

        if ($saved)
        $ordenTrabajo->empleadoordentrabajo->sendFCM('Su orden de trabajo se ha cancelado!');
  
        $notificacion = 'La orden de trabajo se ha cancelado correctamente';
        return redirect('/orden_trabajos')->with(compact('notificacion')); 

    }
    public function postConfirm(OrdenTrabajo $ordenTrabajo)
    {
        $ordenTrabajo->Activa = 'confirmada';
        $saved = $ordenTrabajo->save();

        if ($saved)
            $ordenTrabajo->empleadoordentrabajo->sendFCM('Su orden de trabajo se ha confirmado!');
  
        $notificacion = 'La orden de trabajo se ha confirmado correctamente';
        return back()->with(compact('notificacion')); 

    }
    public function postAtender(OrdenTrabajo $ordenTrabajo)
    {
        $ordenTrabajo->Activa = 'en progreso';
        $saved = $ordenTrabajo->save();

        if ($saved)
            $ordenTrabajo->empleadoordentrabajo->sendFCM('Su orden de trabajo está en progreso!');
  
        $notificacion = 'La orden de trabajo se ha puesto en progreso correctamente';
        return back()->with(compact('notificacion')); 

    }


    public function showweb(OrdenTrabajo $ordenTrabajo)
    {
        $Tipo = auth()->user()->Tipo;
        return view ('OrdenTrabajo.ver', compact('ordenTrabajo', 'Tipo'));

    }

    public function showFinalizarForm(OrdenTrabajo $ordenTrabajo)
    {
        if ($ordenTrabajo->Activa == 'en progreso')
            return view ('OrdenTrabajo.finalizar', compact('ordenTrabajo'));

        return redirect('/orden_trabajos');  

    }

    public function postFinalizar(OrdenTrabajo $ordenTrabajo, Request $request)
    {
        if ($request->has('Resultado'))
            $ordenTrabajo->Resultado = $request->input('Resultado');

        $ordenTrabajo->Activa = 'atendida';
        $saved = $ordenTrabajo->save();

        if ($saved)
            $ordenTrabajo->empleadoordentrabajo->sendFCM('Su orden de trabajo se ha finalizado!');
  
        $notificacion = 'La orden de trabajo se ha finalizado correctamente';
        return redirect('/orden_trabajos')->with(compact('notificacion')); 

    }
}
