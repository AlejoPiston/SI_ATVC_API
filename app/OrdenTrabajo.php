<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    protected $table = "OrdenTrabajo";
    protected $primaryKey = 'Id';
    //Sql server
    //protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = [ "Fecha", 
                            "Dano", 
                            "Resultado", 
                            "Activa",
                            "FechaHoraArrivo", 
                            "FechaHoraSalida",
                            "IdFicha",
                            "IdTurno",
                            "IdEmpleado",
                            "IdCliente",
                            "IdUsuario"];
    
    public function fichaordentrabajo(){
        return $this->belongsTo('App\Ficha', 'IdFicha');
    }
    public function turnoordentrabajo(){
        return $this->belongsTo('App\TurnoOrdenTrabajo', 'IdTurno');
    }
    public function empleadoordentrabajo(){
        return $this->belongsTo('App\User', 'IdEmpleado');
    }
    public function usuarioordentrabajo(){
        return $this->belongsTo('App\User', 'IdUsuario');
    }
    public function clienteordentrabajo(){
        return $this->belongsTo('App\User', 'IdCliente');
    }
}
