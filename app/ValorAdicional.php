<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValorAdicional extends Model
{
    //
    protected $table = "ValorAdicional";
    protected $primaryKey = 'Id';
    protected $dateFormat = 'M j Y h:i:s';
    protected $fillable = ["Nombre", "Costo", "Descripcion"];
}
