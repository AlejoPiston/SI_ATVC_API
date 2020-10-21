<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\OrdenTrabajo;
use DB;


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
        $dias_seman = collect(['0','0','0','0','0','0','0']);
        $ordenes_trabajo_por_dia = OrdenTrabajo::select([
            DB::raw('DATEPART(dw,Fecha) as dia'), 
            DB::raw('COUNT(*) as num')
            ])->groupBy(DB::raw('Fecha'))
            ->where('Activa', 'confirmada')
            ->get();
           if($ordenes_trabajo_por_dia->toArray() == null){
                $ots_por_dia = ['0','0','0','0','0','0','0'];
           }else{
            foreach ($ordenes_trabajo_por_dia as $ot_dia) {
            
                if ($ot_dia->dia == '0'){
                    $ots_por_dia = $dias_seman->put(0, $ot_dia->num);
                }if($ot_dia->dia == '1'){
                    $ots_por_dia = $dias_seman->put(1, $ot_dia->num);
                }if($ot_dia->dia == '2'){
                    $ots_por_dia = $dias_seman->put(2, $ot_dia->num);
                }if($ot_dia->dia == '3'){
                    $ots_por_dia = $dias_seman->put(3, $ot_dia->num);
                }if($ot_dia->dia == '4'){
                    $ots_por_dia = $dias_seman->put(4, $ot_dia->num);
                }if($ot_dia->dia == '5'){
                    $ots_por_dia = $dias_seman->put(5, $ot_dia->num);
                }if($ot_dia->dia == '6'){
                    $ots_por_dia = $dias_seman->put(6, $ot_dia->num);
                } 
            }

           }
        
        return view('home', compact('ots_por_dia'));
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
