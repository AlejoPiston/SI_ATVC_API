<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurnoOrdenTrabajo extends Model
{
    protected $table = "TurnoOrdenTrabajo";
    protected $primaryKey = 'Id';
    //Sql server
    protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = [ "Hora", 
                            "Minuto"];
}
