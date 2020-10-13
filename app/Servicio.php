<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //
    protected $table = "Servicio";
    protected $primaryKey = 'Id';
    //Sql server
    protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = [ "Nombre", 
                            "Descripcion", 
                            "ValorInscripcion", 
                            "ValorMensualidad",
                            "AplicaIva", 
                            "AplicaIce", 
                            "Estado"];
}
