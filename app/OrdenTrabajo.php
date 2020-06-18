<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    protected $table = "OrdenTrabajo";
    protected $primaryKey = 'Id';
    protected $dateFormat = 'M j Y h:i:s';
    protected $fillable = [ "Fecha", 
                            "Dano", 
                            "Resultado", 
                            "Activa",
                            "FechaHoraArrivo", 
                            "FechaHoraSalida",
                            "IdFicha",
                            "IdTurno",
                            "IdEmpleado"];
    
    public function fichaordentrabajo(){
        return $this->belongsTo('App\Ficha', 'IdFicha');
    }
    public function turnoordentrabajo(){
        return $this->belongsTo('App\TurnoOrdenTrabajo', 'IdTurno');
    }
    public function empleadoordentrabajo(){
        return $this->belongsTo('App\Usuario', 'IdEmpleado');
    }
}
