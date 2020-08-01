<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $table = "Gasto";
    protected $primaryKey = 'Id';
    protected $dateFormat = 'd-m-Y H:i:s';
    protected $fillable = [ "Fecha", 
                            "Concepto", 
                            "Monto", 
                            "IdUsuario"];
    public function usuariogasto(){
        return $this->belongsTo('App\User', 'IdUsuario');
    }
}
