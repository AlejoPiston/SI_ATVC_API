<?php

namespace App\Http\Controllers;

use App\OtroIngreso;
use Illuminate\Http\Request;

class OtroIngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OtroIngreso::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return OtroIngreso::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OtroIngreso  $otroIngreso
     * @return \Illuminate\Http\Response
     */
    public function show(OtroIngreso $otroIngreso)
    {
        return $otroIngreso;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OtroIngreso  $otroIngreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OtroIngreso $otroIngreso)
    {
        $otroIngreso->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OtroIngreso  $otroIngreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtroIngreso $otroIngreso)
    {
        $otroIngreso->delete();

    }
}
