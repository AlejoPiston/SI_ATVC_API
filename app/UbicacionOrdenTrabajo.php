<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UbicacionOrdenTrabajo extends Model
{
    protected $table = "UbicacionOrdenTrabajo";
    protected $primaryKey = 'Id';

    //Sql server
    protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = [ "Latitud", 
                            "Longitud", 
                            "IdOrdenTrabajo"];
    
    public function ordentrabajoubicacion(){
        return $this->belongsTo('App\OrdenTrabajo', 'IdOrdenTrabajo');
    }
    


}
