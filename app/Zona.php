<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    //
    protected $table = "Zona";
    protected $primaryKey = 'Id';
    //Sql server
    //protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = ["Nombre", "Descripcion"];
}
