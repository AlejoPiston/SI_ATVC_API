<?php

namespace App\Http\Controllers;

use App\TurnoOrdenTrabajo;
use Illuminate\Http\Request;

class TurnoOrdenTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TurnoOrdenTrabajo::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return TurnoOrdenTrabajo::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TurnoOrdenTrabajo  $turnoOrdenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show(TurnoOrdenTrabajo $turnoOrdenTrabajo)
    {
        return $turnoOrdenTrabajo;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TurnoOrdenTrabajo  $turnoOrdenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TurnoOrdenTrabajo $turnoOrdenTrabajo)
    {
        $turnoOrdenTrabajo->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TurnoOrdenTrabajo  $turnoOrdenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TurnoOrdenTrabajo $turnoOrdenTrabajo)
    {
        $turnoOrdenTrabajo->delete();

    }
}
