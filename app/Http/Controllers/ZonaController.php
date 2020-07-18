<?php

namespace App\Http\Controllers;

use App\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function indexweb()
    {
        $zonas = Zona::paginate(5);
        return view ('Zona.lista', compact('zonas'));

    }
    public function create()
    {
        $zonas = Zona::all();
        return view ('Zona.create', compact('zonas'));

    }
    public function storeweb(Request $request)
    {
        //
        $rules = [
            'Nombre' => 'required|min:3'
        ];
        $this->validate($request, $rules);

        Zona::create($request->all());

        $notificacion = 'La zona se ha registrado correctamente';
        return redirect('/zonas')->with(compact('notificacion'));

    }
    public function updateweb(Request $request, Zona $zona)
    {
        $rules = [
            'Nombre' => 'required|min:3'
        ];
        $this->validate($request, $rules);
        $zona->update($request->all());

        $notificacion = 'La zona se ha actualizado correctamente';
        return redirect('/zonas')->with(compact('notificacion'));

       
    }
    public function edit(Zona $zona)
    {
        return view ('Zona.edit', compact('zona'));
    }

    public function destroyweb(Zona $zona)
    {
       $NombreEliminado = $zona->Nombre;
       $zona->delete();

       $notificacion = 'La zona '.$NombreEliminado.' se ha eliminado correctamente';
       return redirect('/zonas')->with(compact('notificacion'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Zona::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return Zona::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function show(Zona $zona)
    {
        //
        return $zona;
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zona $zona)
    {
        //
        $zona->update($request->all());
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zona $zona)
    {
        //
       $zona->delete();
    }
}
