<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurnoOrdenTrabajo extends Model
{
    protected $table = "TurnoOrdenTrabajo";
    protected $primaryKey = 'Id';
    protected $dateFormat = 'd-m-Y H:i:s';
    protected $fillable = [ "Hora", 
                            "Minuto"];
}
