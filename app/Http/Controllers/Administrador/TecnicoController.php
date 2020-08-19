<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\User;

use App\Http\Controllers\Controller;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnicos = User::tecnicos()->paginate(5);
        return view ('Tecnico.lista', compact('tecnicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Tecnico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'Apellidos' => 'required|min:3',
            'Direccion' => 'required|min:3',
            'email' => 'required|email',
            'Cedula' => 'required|digits:10',
            'Telefono' => 'required|digits:10',
            'Estado' => 'nullable|min:3',
            'Usuario' => 'nullable|min:3'
            
        ];
        $this->validate($request, $rules);
        User::create(
            $request->only('name', 
                           'Apellidos', 
                           'email', 
                           'Cedula', 
                           'Telefono', 
                           'Direccion', 
                           'Estado', 
                           'Usuario')
            + [
                'Tipo' => 'tecnico',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notificacion = 'El técnico se ha registrado correctamente';
        return redirect('/tecnicos')->with(compact('notificacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tecnico = User::tecnicos()->findOrFail($id);
        return view ('Tecnico.ver', compact('tecnico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tecnico = User::tecnicos()->findOrFail($id);
        return view ('Tecnico.edit', compact('tecnico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'Apellidos' => 'required|min:3',
            'Direccion' => 'required|min:3',
            'email' => 'required|email',
            'Cedula' => 'required|digits:10',
            'Telefono' => 'required|digits:10',
            'Estado' => 'nullable|min:3',
            'Usuario' => 'nullable|min:3'
            
        ];
        $this->validate($request, $rules);

        $tecnico = User::tecnicos()->findOrFail($id);

        $data =  $request->only('name', 'Apellidos', 'email', 'Cedula', 'Telefono', 'Direccion', 
        'Estado', 
        'Usuario');
        $password = $request->input('password');

        if($password )
            $data['password'] = bcrypt($password);
        
        $tecnico->fill($data);
        $tecnico->save();
        
        $notificacion = 'La información del técnico se ha actualizado correctamente';
        return redirect('/tecnicos')->with(compact('notificacion'));
    }

   
    public function destroy(User $tecnico)
    {
        $tecnicoEliminado = $tecnico->name;
       $tecnico->delete();

       $notificacion = 'El técnico '.$tecnicoEliminado.' se ha eliminado correctamente';
       return redirect('/tecnicos')->with(compact('notificacion'));
    }
}
