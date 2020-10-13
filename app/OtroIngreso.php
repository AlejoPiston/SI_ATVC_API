<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtroIngreso extends Model
{
    protected $table = "OtroIngreso";
    protected $primaryKey = 'Id';
    //Sql server
    protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = [ "Fecha", 
                            "Concepto", 
                            "Monto", 
                            "IdUsuario"];
    public function usuariogasto(){
        return $this->belongsTo('App\User', 'IdUsuario');
    }
}
