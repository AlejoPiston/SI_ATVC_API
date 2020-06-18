<?php

namespace App\Http\Controllers;

use App\CorteReconexion;
use Illuminate\Http\Request;

class CorteReconexionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CorteReconexion::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return CorteReconexion::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CorteReconexion  $corteReconexion
     * @return \Illuminate\Http\Response
     */
    public function show(CorteReconexion $corteReconexion)
    {
        return $corteReconexion;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CorteReconexion  $corteReconexion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CorteReconexion $corteReconexion)
    {
        $corteReconexion->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CorteReconexion  $corteReconexion
     * @return \Illuminate\Http\Response
     */
    public function destroy(CorteReconexion $corteReconexion)
    {
        $corteReconexion->delete();

    }
}
