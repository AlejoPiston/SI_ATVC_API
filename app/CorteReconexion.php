<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorteReconexion extends Model
{
    protected $table = "CorteReconexion";
    protected $primaryKey = 'Id';
    protected $dateFormat = 'd-m-Y H:i:s';
    protected $fillable = [ "Fechacorte", 
                            "ObservacionCorte", 
                            "FechaReconexion", 
                            "ObservacionReconexion",
                            "IdFicha", 
                            "IdUsuarioCorte",
                            "IdUsuarioReconexion"];
    
    public function fichacortereconexion(){
        return $this->belongsTo('App\Ficha', 'IdFicha');
    }
}
