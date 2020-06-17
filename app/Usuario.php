<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table = "Usuario";
    protected $primaryKey = 'Id';
    protected $dateFormat = 'M j Y h:i:s';
    protected $fillable = [ "Nombres", 
                            "Apellidos", 
                            "Cedula", 
                            "Direccion",
                            "Telefono", 
                            "Tipo",
                            "Password", 
                            "Usuario", 
                            "Estado"];
    
}
