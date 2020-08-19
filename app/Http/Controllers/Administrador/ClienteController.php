<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\User;

use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = User::clientes()->paginate(5);
        return view ('Cliente.lista', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Cliente.create'); 
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
                'Tipo' => 'cliente',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notificacion = 'El cliente se ha registrado correctamente';
        return redirect('/clientes')->with(compact('notificacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = User::clientes()->findOrFail($id);
        return view ('Cliente.ver', compact('cliente'));
    }

    
    public function edit(User $cliente)
    {
        return view ('Cliente.edit', compact('cliente'));
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

        $cliente = User::clientes()->findOrFail($id);

        $data =  $request->only('name', 'Apellidos', 'email', 'Cedula', 'Telefono', 'Direccion', 
        'Estado', 
        'Usuario');
        $password = $request->input('password');

        if($password )
            $data['password'] = bcrypt($password);
        
        $cliente->fill($data);
        $cliente->save();
        
        $notificacion = 'La información del cliente se ha actualizado correctamente';
        return redirect('/clientes')->with(compact('notificacion'));
    }

    
    public function destroy(User $cliente)
    {
        $clienteEliminado = $cliente->name;
       $cliente->delete();

       $notificacion = 'El cliente '.$clienteEliminado.' se ha eliminado correctamente';
       return redirect('/clientes')->with(compact('notificacion'));
    }
}
