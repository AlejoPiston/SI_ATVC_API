<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValorAdicional extends Model
{
    //
    protected $table = "ValorAdicional";
    protected $primaryKey = 'Id';
    //Sql server
    protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = ["Nombre", "Costo", "Descripcion"];
}
