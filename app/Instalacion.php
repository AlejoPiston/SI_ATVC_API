<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    protected $table = "Instalacion";
    protected $primaryKey = 'Id';
    protected $dateFormat = 'M j Y h:i:s';
    protected $fillable = [ "NombreCliente",
                            "Direccion", 
                            "Referencia", 
                            "Telefono", 
                            "Fecha", 
                            "Activa",
                            "FechaHoraArrivo", 
                            "FechaHoraSalida",
                            "Resultado", 
                            "IdVendedor",
                            "IdTurno",
                            "IdEmpleado"];
    
    public function vendedorinstalacion(){
        return $this->belongsTo('App\Usuario', 'IdVendedor');
    }
    public function turnoinstalacion(){
        return $this->belongsTo('App\TurnoOrdenTrabajo', 'IdTurno');
    }
    public function empleadoinstalacion(){
        return $this->belongsTo('App\Usuario', 'IdEmpleado');
    }
}
