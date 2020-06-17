<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CobroMensualidad extends Model
{
    protected $table = "CobroMensualidad";
    public $incrementing = false;
    protected $dateFormat = 'M j Y h:i:s';
    protected $fillable = ["IdCobro", 
                           "IdMensualidad", 
                           "Valor"];

    public function cobrocobromensualidad(){
        return $this->belongsTo('App\Cobro', 'IdCobro');
    }
    public function mensualidadcobromensualidad(){
        return $this->belongsTo('App\Mensualidad', 'IdMensualidad');
    }
}
