<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    //
    protected $table = "Zona";
    protected $primaryKey = 'Id';
    protected $dateFormat = 'M j Y h:i:s';
    protected $fillable = ["Nombre", "Descripcion"];
}
