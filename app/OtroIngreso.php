<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtroIngreso extends Model
{
    protected $table = "OtroIngreso";
    protected $primaryKey = 'Id';
    protected $dateFormat = 'M j Y h:i:s';
    protected $fillable = [ "Fecha", 
                            "Concepto", 
                            "Monto", 
                            "IdUsuario"];
    public function usuariogasto(){
        return $this->belongsTo('App\Usuario', 'IdUsuario');
    }
}
