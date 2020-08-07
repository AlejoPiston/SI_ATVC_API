<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobro extends Model
{
    protected $table = "Cobro";
    protected $primaryKey = 'Id';
    //Sql server
    //protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = [ "Fecha", 
                            "ValorEfectivo", 
                            "ValorCheque", 
                            "NumeroCheque",
                            "BancoCheque", 
                            "ValorTotal",
                            "Iva", 
                            "Concepto", 
                            "NumeroDocumento",
                            "TipoDocumento", 
                            "Descuento",
                            "Ice", 
                            "Observacion", 
                            "Reverso",
                            "ComentarioReverso", 
                            "Retencion",
                            "FechaReverso", 
                            "EnviadoAzur", 
                            "Electronico",
                            "PorCobrar", 
                            "IdUsuario", 
                            "IdUsuarioReverso",
                            "Establecimiento", 
                            "PuntoEmision"];
    
    public function usuariocobro(){
        return $this->belongsTo('App\User', 'IdUsuario');
    }
}
