<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\User;

use App\Http\Controllers\Controller;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administradores = User::administradores()->paginate(5);
        return view ('Administrador.lista', compact('administradores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Administrador.create'); 
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
                'Tipo' => 'administrador',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notificacion = 'El administrador se ha registrado correctamente';
        return redirect('/administradores')->with(compact('notificacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $administrador = User::administradores()->findOrFail($id);
        return view ('Administrador.ver', compact('administrador'));
    }

    
   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $administrador = User::administradores()->findOrFail($id);
        return view ('Administrador.edit', compact('administrador'));
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

        $administrador = User::administradores()->findOrFail($id);

        $data =  $request->only('name', 'Apellidos', 'email', 'Cedula', 'Telefono', 'Direccion', 
        'Estado', 
        'Usuario');
        $password = $request->input('password');

        if($password )
            $data['password'] = bcrypt($password);
        
        $administrador->fill($data);
        $administrador->save();
        
        $notificacion = 'La información del administrador se ha actualizado correctamente';
        return redirect('/administradores')->with(compact('notificacion'));
    }

    
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $administrador = User::administradores()->findOrFail($id);

        $administradorEliminado = $administrador->name;
        $administrador->delete();
 
        $notificacion = 'El administrador '.$administradorEliminado.' se ha eliminado correctamente';
        return redirect('/administradores')->with(compact('notificacion'));
    }
}
