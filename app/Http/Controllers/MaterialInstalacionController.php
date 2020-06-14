<?php

namespace App\Http\Controllers;

use App\MaterialInstalacion;
use Illuminate\Http\Request;

class MaterialInstalacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MaterialInstalacion::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return MaterialInstalacion::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaterialInstalacion  $materialInstalacion
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialInstalacion $materialInstalacion)
    {
        return $materialInstalacion;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaterialInstalacion  $materialInstalacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialInstalacion $materialInstalacion)
    {
        $materialInstalacion->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaterialInstalacion  $materialInstalacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaterialInstalacion $materialInstalacion)
    {
        $materialInstalacion->delete();
    }
}
