<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retencion extends Model
{
    protected $table = "Retencion";
    protected $primaryKey = 'Id';
    //Sql server
    //protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = [ "BaseImponibleRenta", 
                            "PorcentajeRenta", 
                            "ValorRenta", 
                            "BaseImponibleIva",
                            "PorcentajeIva", 
                            "ValorIva",
                            "NumeroComprobante",
                            "IdCobro"];
    
    public function cobroretencion(){
        return $this->belongsTo('App\Cobro', 'IdCobro');
    }
}
