<?php

namespace App\Http\Controllers;

use App\CobroMensualidad;
use Illuminate\Http\Request;

class CobroMensualidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CobroMensualidad::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return CobroMensualidad::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CobroMensualidad  $cobroMensualidad
     * @return \Illuminate\Http\Response
     */
    public function show(CobroMensualidad $cobroMensualidad)
    {
        return $cobroMensualidad;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CobroMensualidad  $cobroMensualidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CobroMensualidad $cobroMensualidad)
    {
        $cobroMensualidad->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CobroMensualidad  $cobroMensualidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(CobroMensualidad $cobroMensualidad)
    {
        $cobroMensualidad->delete();

    }
}
