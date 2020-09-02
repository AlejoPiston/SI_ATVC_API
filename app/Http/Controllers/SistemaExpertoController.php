<?php

namespace App\Http\Controllers;
use App\Ficha;
use Illuminate\Http\Request;

class SistemaExpertoController extends Controller
{

    public function gettecnico(Request $request)
    {
        $date = $request->input('date');
        $dano = $request->input('dano');
        $idficha = $request->input('ficha');

        $ficha = Ficha::where('Id', $idficha)->with([
            'zonaficha' => function ($query) {
                $query->select('Id', 'Nombre');
            },
            'servicioficha' => function ($query) {
                $query->select('Id', 'Nombre');
            },
            'usuarioficha' => function ($query) {
                $query->select('id', 'name');
            },
              
            ])
            ->first();
        
        
        return $ficha;

    }
}
