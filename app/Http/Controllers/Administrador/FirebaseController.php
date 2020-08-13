<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class FirebaseController extends Controller
{
    public function sendAll(Request $request)
    {
        $recipients = User::whereNotNull('device_token')->pluck('device_token')->toArray();
        //dd($recipients);
        fcm()
            ->to($recipients) // $recipients must an array
            ->notification([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
            ])
        ->send();
        $notificacion = 'Notificación enviada a todos los usuarios (Android).';
        return back()->with(compact('notificacion'));
       
    }  
}
