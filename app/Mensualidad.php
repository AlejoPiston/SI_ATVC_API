<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensualidad extends Model
{
    protected $table = "Mensualidad";
    protected $primaryKey = 'Id';
    //Sql server
    //protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = [ "FechaInicio", 
                            "FechaFin", 
                            "Valor", 
                            "Abono",
                            "Saldo", 
                            "Tipo",
                            "AplicaIce",
                            "IdFicha"];
    
    public function fichamensualidad(){
        return $this->belongsTo('App\Ficha', 'IdFicha');
    }
}
