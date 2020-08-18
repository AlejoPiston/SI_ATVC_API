<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancelacionOrdenTrabajo extends Model
{
    protected $table = "CancelacionOrdenTrabajo";

    protected $fillable = [ "Justificacion", 
    "IdOrdenTrabajo", 
    "Cancelado_por"];


    public function Cancelado_porUser() // cancelled_by_id
    {	// belongsTo Cancellation N - 1 User hasMany
    	return $this->belongsTo(User::class, 'Cancelado_por');
    }
    
}
