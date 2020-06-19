<?php

namespace App\Http\Controllers;

use App\Instalacion;
use Illuminate\Http\Request;

class InstalacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Instalacion::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Instalacion::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instalacion  $instalacion
     * @return \Illuminate\Http\Response
     */
    public function show(Instalacion $instalacion)
    {
        return $instalacion;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instalacion  $instalacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instalacion $instalacion)
    {
        $instalacion->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instalacion  $instalacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instalacion $instalacion)
    {
        $instalacion->delete();

    }
}
