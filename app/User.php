<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $dateFormat = 'd-m-Y H:i:s';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'Apellidos', 
        'Cedula', 'Direccion', 
        'Telefono', 'Tipo', 
        'Usuario', 
        'Estado', 'Tipo', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'atendidas_ordenes_trabajo_count' => 'integer',
        'canceladas_ordenes_trabajo_count' => 'integer' 
          
    ];

    public function scopeTecnicos($query){
        return $query->where('Tipo', 'tecnico');
    }
    public function scopeAdministradores($query){
        return $query->where('Tipo', 'administrador');
    }
    public function scopeClientes($query){
        return $query->where('Tipo', 'cliente');
    }

    public function asTecnicoOrdenesTrabajo(){
        return $this->hasMany(OrdenTrabajo::class, 'IdEmpleado');
    }
    public function atendidasOrdenesTrabajo(){
        return $this->asTecnicoOrdenesTrabajo()->where('Activa', 'atendida');
    }
    public function canceladasOrdenesTrabajo(){
        return $this->asTecnicoOrdenesTrabajo()->where('Activa', 'cancelada');
    }
}
