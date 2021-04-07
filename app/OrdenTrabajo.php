<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;


class OrdenTrabajo extends Model
{
    protected $table = "OrdenTrabajo";
    protected $primaryKey = 'Id';
    //Sql server
    protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = [ "Fecha", 
                            "Dano", 
                            "NombreCliente",
                            "Direccion",
                            "Telefono",
                            "Referencia",
                            "Tipo",
                            "IdVendedor",
                            "Resultado", 
                            "Descripcion", 
                            "Activa",
                            "FechaHoraArrivo", 
                            "FechaHoraSalida",
                            "IdFicha",
                            "IdTurno",
                            "IdEmpleado",
                            "IdCliente",
                            "IdUsuario"];

    protected $hidden = [  "IdFicha",
                            "IdTurno",
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
    public function cancelacion(){
        return $this->hasOne(CancelacionOrdenTrabajo::class, 'IdOrdenTrabajo');
    }
    

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d/m/Y g:i:s A');
    }

    protected $casts = [
        'FechaHoraArrivo' => 'datetime',
        'FechaHoraSalida' => 'datetime',
    ];

}
