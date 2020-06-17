<?php

namespace App\Http\Controllers;

use App\CierreCaja;
use Illuminate\Http\Request;

class CierreCajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CierreCaja::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return CierreCaja::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CierreCaja  $cierreCaja
     * @return \Illuminate\Http\Response
     */
    public function show(CierreCaja $cierreCaja)
    {
        return $cierreCaja;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CierreCaja  $cierreCaja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CierreCaja $cierreCaja)
    {
        $cierreCaja->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CierreCaja  $cierreCaja
     * @return \Illuminate\Http\Response
     */
    public function destroy(CierreCaja $cierreCaja)
    {
        $cierreCaja->delete();
    }
}
