<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CierreCaja extends Model
{
    protected $table = "CierreCaja";
    protected $primaryKey = 'Id';
    //Sql server
    protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = [ "Fecha", 
                            "ValorCuadrar", 
                            "Faltante", 
                            "Observacion",
                            "UnCentavo", 
                            "CincoCentavos",
                            "DiezCentavos", 
                            "VeinticincoCentavos", 
                            "CincuentaCentavos",
                            "DolarMoneda", 
                            "DolarBillete",
                            "CincoDolares", 
                            "DiezDolares", 
                            "VeinteDolares",
                            "CincuentaDolares", 
                            "CienDolares",
                            "Cheques", 
                            "Ingresos", 
                            "Gastos",
                            "MontoApertura", 
                            "MontoDeposito", 
                            "MontoCierre",
                            "OtrosIngresos", 
                            "Retenciones",
                            "Abierta", 
                            "IdUsuario"];
    
    public function usuariocierrecaja(){
        return $this->belongsTo('App\User', 'IdUsuario');
    }
}
