<?php

namespace App\Http\Controllers;

use App\Retencion;
use Illuminate\Http\Request;

class RetencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Retencion::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Retencion::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Retencion  $retencion
     * @return \Illuminate\Http\Response
     */
    public function show(Retencion $retencion)
    {
        return $retencion;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retencion  $retencion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retencion $retencion)
    {
        $retencion->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retencion  $retencion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retencion $retencion)
    {
        $retencion->delete();

    }
}
