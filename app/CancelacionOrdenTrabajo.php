<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancelacionOrdenTrabajo extends Model
{
    protected $table = "CancelacionOrdenTrabajo";
    //Sql server
    protected $dateFormat = 'd-m-Y H:i:s';

    protected $fillable = [ "Justificacion", 
    "IdOrdenTrabajo", 
    "Cancelado_por"];


    public function Cancelado_porUser() // cancelled_by_id
    {	// belongsTo Cancellation N - 1 User hasMany
    	return $this->belongsTo(User::class, 'Cancelado_por');
    }
    
}
