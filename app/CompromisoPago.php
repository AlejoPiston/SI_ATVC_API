<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompromisoPago extends Model
{
    protected $table = "CompromisoPago";
    protected $primaryKey = 'Id';
    //Sql server
    protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = ["Fecha", 
                           "Observacion", 
                           "IdFicha",
                           "IdUsuario"];

    public function fichacompromisopago(){
        return $this->belongsTo('App\Ficha', 'IdFicha');
    }
    public function usuariocompromisopago(){
        return $this->belongsTo('App\User', 'IdUsuario');
    }
}
