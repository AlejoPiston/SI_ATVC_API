<?php

namespace App\Http\Controllers;

use App\ValorAdicional;
use Illuminate\Http\Request;

class ValorAdicionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ValorAdicional::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return ValorAdicional::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ValorAdicional  $valorAdicional
     * @return \Illuminate\Http\Response
     */
    public function show(ValorAdicional $valorAdicional)
    {
        return $valorAdicional;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ValorAdicional  $valorAdicional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ValorAdicional $valorAdicional)
    {
        $valorAdicional->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ValorAdicional  $valorAdicional
     * @return \Illuminate\Http\Response
     */
    public function destroy(ValorAdicional $valorAdicional)
    {
        $valorAdicional->delete();
    }
}
