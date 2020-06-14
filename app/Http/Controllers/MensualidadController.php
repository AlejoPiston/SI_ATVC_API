<?php

namespace App\Http\Controllers;

use App\Mensualidad;
use Illuminate\Http\Request;

class MensualidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Mensualidad::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Mensualidad::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensualidad  $mensualidad
     * @return \Illuminate\Http\Response
     */
    public function show(Mensualidad $mensualidad)
    {
        return $mensualidad;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensualidad  $mensualidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensualidad $mensualidad)
    {
        $mensualidad->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensualidad  $mensualidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensualidad $mensualidad)
    {
        $mensualidad->delete();
    }
}
