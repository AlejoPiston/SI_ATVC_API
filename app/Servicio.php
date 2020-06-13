<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //
    protected $table = "Servicio";
    protected $primaryKey = 'Id';
    protected $dateFormat = 'M j Y h:i:s';
    protected $fillable = [ "Nombre", 
                            "Descripcion", 
                            "ValorInscripcion", 
                            "ValorMensualidad",
                            "AplicaIva", 
                            "AplicaIce", 
                            "Estado"];
}
