<?php

namespace App\Http\Controllers;

use App\Instalacion;
use Illuminate\Http\Request;
use App\OrdenTrabajo;
use App\UbicacionOrdenTrabajo;
use App\Ficha;
use App\User; 
use App\CancelacionOrdenTrabajo;


class InstalacionController extends Controller
{

    public function indexweb()
    {
        $Tipo = auth()->user()->Tipo;

        if($Tipo == 'administrador'){

            $ordenestrabajos_pendientes = OrdenTrabajo::where('Activa', 'registrada')
            ->where('Tipo', 'instalacion')
                ->paginate(5);
               //dd($ordenestrabajos_pendientes);
               //->paginate(5, ['*'], 'pendientes');

            $ordenestrabajos_confirmadas = OrdenTrabajo::where('Activa', 'confirmada')
            ->where('Tipo', 'instalacion')
                ->paginate(5);
            
            $ordenestrabajos_encamino = OrdenTrabajo::where('Activa', 'en camino')
            ->where('Tipo', 'instalacion')
                ->paginate(5);
                //dd($ordenestrabajos_confirmadas);
                //dd($ordenestrabajos_confirmadas->url($ordenestrabajos_confirmadas->currentPage()));

            $ordenestrabajos_enprogreso = OrdenTrabajo::where('Activa', 'en progreso')
            ->where('Tipo', 'instalacion')
                ->paginate(5);
            
            $ordenestrabajos_historial = OrdenTrabajo::whereIn('Activa', ['atendida', 'cancelada'])
            ->where('Tipo', 'instalacion')
                ->paginate(5);

        } elseif($Tipo == 'tecnico'){

            $ordenestrabajos_pendientes = OrdenTrabajo::where('Activa', 'registrada')
            ->where('Tipo', 'instalacion')
                ->where('IdEmpleado', auth()->id())
                ->paginate(5);
            $ordenestrabajos_confirmadas = OrdenTrabajo::where('Activa', 'confirmada')
            ->where('Tipo', 'instalacion')
                ->where('IdEmpleado', auth()->id())
                ->paginate(5);
            
            $ordenestrabajos_encamino = OrdenTrabajo::where('Activa', 'en camino')
            ->where('Tipo', 'instalacion')
                ->where('IdEmpleado', auth()->id())
                ->paginate(5);
            $ordenestrabajos_enprogreso = OrdenTrabajo::where('Activa', 'en progreso')
            ->where('Tipo', 'instalacion')
                ->where('IdEmpleado', auth()->id())
                ->paginate(5);
            $ordenestrabajos_historial = OrdenTrabajo::whereIn('Activa', ['atendida', 'cancelada'])
            ->where('Tipo', 'instalacion')
                ->where('IdEmpleado', auth()->id())
                ->paginate(5);

        } elseif($Tipo == 'cliente') {

            $ordenestrabajos_pendientes = OrdenTrabajo::where('Activa', 'registrada')
            ->where('Tipo', 'instalacion')
                ->where('IdCliente', auth()->id())
                ->paginate(5);
            $ordenestrabajos_confirmadas = OrdenTrabajo::where('Activa', 'confirmada')
            ->where('Tipo', 'instalacion')
                ->where('IdCliente', auth()->id())
                ->paginate(5);
            $ordenestrabajos_encamino = OrdenTrabajo::where('Activa', 'en camino')
            ->where('Tipo', 'instalacion')
                ->where('IdCliente', auth()->id())
                ->paginate(5);
            $ordenestrabajos_enprogreso = OrdenTrabajo::where('Activa', 'en progreso')
            ->where('Tipo', 'instalacion')
                ->where('IdCliente', auth()->id())
                ->paginate(5);
            $ordenestrabajos_historial = OrdenTrabajo::whereIn('Activa', ['atendida', 'cancelada'])
            ->where('Tipo', 'instalacion')
                ->where('IdCliente', auth()->id())
                ->paginate(5);

        }
        return view ('Instalacion.lista',
             compact('ordenestrabajos_pendientes', 'ordenestrabajos_confirmadas', 'ordenestrabajos_encamino', 
             'ordenestrabajos_enprogreso', 'ordenestrabajos_historial', 'Tipo')
        );

    }
    public function create()
    {
        $tecnicos = User::tecnicos()->get();
        return view ('Instalacion.create', compact('tecnicos'));

    }
    public function storeweb(Request $request)
    {
        $ficha = new Ficha();
        $ficha->Nombres = $request->input('NombreCliente');
        $ficha->DireccionDomicilio = $request->input('Direccion');
        $ficha->TelefonoDomicilio = $request->input('Telefono');
        $ficha->FechaInscripcion = $request->input('Fecha');
        $ficha->Latitud = $request->input('Latitud');
        $ficha->Longitud = $request->input('Longitud');
        $ficha->Referencia = $request->input('Referencia');

        $ficha->save();
        //
        $rules = [
            'NombreCliente' => 'required|min:3',
            'Direccion' => 'required|min:3',
            'Referencia' => 'required|min:3',
            'Telefono' => 'required|digits:10',
            'Fecha' => 'required',
            'IdEmpleado' => 'required'
        ];
        $this->validate($request, $rules);

        $Tipo = auth()->user()->Tipo;
        $idUsuario = auth()->user()->id;

       
        if($Tipo == 'administrador'){

            $ordenTrabajo = OrdenTrabajo::create(
                $request->only('Fecha', 
                               'NombreCliente', 
                               'Direccion', 
                               'Referencia', 
                               'FechaHoraArrivo', 
                               'FechaHoraSalida', 
                               'Telefono',
                               'IdEmpleado')
                + [
                    'IdUsuario' => $idUsuario,
                    'IdFicha' => $ficha->Id,
                    'Activa' => 'confirmada',
                    'Resultado' => 'ninguno',
                    'Tipo' => 'instalacion'
                ]
            );

            $ubicacion = new UbicacionOrdenTrabajo();
            $ubicacion->Latitud ='pendiente';
            $ubicacion->Longitud ='pendiente';
            $ubicacion->EstadoOrdenTrabajo = $ordenTrabajo->Activa;
            $ubicacion->IdOrdenTrabajo = $ordenTrabajo->Id;
            $ubicacion->save();

        } elseif($Tipo == 'cliente') {

            $ordenTrabajo = OrdenTrabajo::create(
                $request->only('Fecha', 
                               'Dano', 
                               'FechaHoraArrivo', 
                               'FechaHoraSalida', 
                               'IdFicha',
                               'IdTurno', 
                               'IdCliente',
                               'IdEmpleado')
                + [
                    'IdUsuario' => $idUsuario,
                    'Activa' => 'registrada',
                    'Resultado' => 'ninguno',
                    'Tipo' => 'fallo'
                ]
            );
            $ubicacion = new UbicacionOrdenTrabajo();
            $ubicacion->Latitud ='pendiente';
            $ubicacion->Longitud ='pendiente';
            $ubicacion->EstadoOrdenTrabajo = $ordenTrabajo->Activa;
            $ubicacion->IdOrdenTrabajo = $ordenTrabajo->Id;
            $ubicacion->save();
        }

        

        $ordenTrabajo->empleadoordentrabajo->sendFCM('Ha recibido una nueva instalación!');

        $notificacion = 'La instalación se ha registrado correctamente';
        return redirect('/instalaciones')->with(compact('notificacion'));

    }
    public function showweb(OrdenTrabajo $ordenTrabajo)
    {
        $Tipo = auth()->user()->Tipo;
        return view ('Instalacion.ver', compact('ordenTrabajo', 'Tipo'));

    }
    public function postAtender(OrdenTrabajo $ordenTrabajo)
    {
        $ordenTrabajo->Activa = 'en camino';
        $saved = $ordenTrabajo->save();

        if ($saved)
            $ordenTrabajo->empleadoordentrabajo->sendFCM('Su instalación está en camino!');
  
        $notificacion = 'La instalación se ha puesto en camino correctamente';
        return back()->with(compact('notificacion')); 

    }
    public function showCancelForm(OrdenTrabajo $ordenTrabajo)
    {
        if ($ordenTrabajo->Activa == 'confirmada'|| $ordenTrabajo->Activa == 'en camino')
            return view ('Instalacion.cancelar', compact('ordenTrabajo'));

        return redirect('/instalaciones');  

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
        $ordenTrabajo->empleadoordentrabajo->sendFCM('Su instalación se ha cancelado!');
  
        $notificacion = 'La instalación se ha cancelado correctamente';
        return redirect('/instalaciones')->with(compact('notificacion')); 

    }
    public function postSolucionar(OrdenTrabajo $ordenTrabajo)
    {
        $ordenTrabajo->Activa = 'en progreso';
        $saved = $ordenTrabajo->save();

        if ($saved)
            $ordenTrabajo->empleadoordentrabajo->sendFCM('Su instalación está en progreso!');
  
        $notificacion = 'La instalación se ha puesto en progreso correctamente';
        return back()->with(compact('notificacion')); 

    }
    public function showFinalizarForm(OrdenTrabajo $ordenTrabajo)
    {
        if ($ordenTrabajo->Activa == 'en progreso')
            return view ('Instalacion.finalizar', compact('ordenTrabajo'));

        return redirect('/instalaciones');  

    }

    public function postFinalizar(OrdenTrabajo $ordenTrabajo, Request $request)
    {
        if ($request->has('Resultado'))
            $ordenTrabajo->Resultado = $request->input('Resultado');

        $ordenTrabajo->Activa = 'atendida';
        $saved = $ordenTrabajo->save();

        if ($saved)
            $ordenTrabajo->empleadoordentrabajo->sendFCM('Su instalación se ha finalizado!');
  
        $notificacion = 'La instalación se ha finalizado correctamente';
        return redirect('/instalaciones')->with(compact('notificacion')); 

    }

}
