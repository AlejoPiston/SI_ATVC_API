<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function perfil($id)
    {
        $user = User::findOrFail($id);
        return view ('perfil', compact('user'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view ('editperfil', compact('user'));
    }


    
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

        $user = User::findOrFail($id);

        $data =  $request->only('name', 'Apellidos', 'email', 'Cedula', 'Telefono', 'Direccion', 
        'Estado', 
        'Usuario');
        $password = $request->input('password');

        if($password )
            $data['password'] = bcrypt($password);
        
        $user->fill($data);
        $user->save();
        
        $notificacion = 'Su perfil se ha actualizado correctamente';
        return redirect('/perfil/'.$id)->with(compact('notificacion'));
    }

}
