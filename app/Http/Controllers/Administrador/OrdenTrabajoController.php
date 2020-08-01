<?php

namespace App\Http\Controllers\Administrador;

use App\OrdenTrabajo;
use App\Ficha;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class OrdenTrabajoController extends Controller
{

    public function indexweb()
    {
        $ordenestrabajos = OrdenTrabajo::paginate(5);
        return view ('OrdenTrabajo.lista', compact('ordenestrabajos'));

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

        OrdenTrabajo::create($request->all());

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
