<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = "Ficha";
    protected $primaryKey = 'Id';
    //Sql server
    protected $dateFormat = 'd-m-Y H:i:s'; 
    protected $fillable = [ "Nombres", 
                            "Apellidos", 
                            "CedulaRuc", 
                            "DireccionDomicilio",
                            "Latitud",
                            "Longitud",
                            "TelefonoDomicilio", 
                            "DireccionCobro",
                            "TelefonoCobro", 
                            "Referencia", 
                            "CobroDomicilio",
                            "Archivada", 
                            "FechaInscripcion",
                            "Email", 
                            "ValorInscripcion", 
                            "ValorMaterial",
                            "ValorOtros", 
                            "ValorMensual",
                            "FechaCobro", 
                            "Observacion", 
                            "Estado",
                            "TvAdicional", 
                            "Filtro", 
                            "MensualidadesPendientes",
                            "Factura", 
                            "Renegociar",
                            "PagadoHasta", 
                            "NumSerieEquipo", 
                            "EquipoRetirado ",
                            "IdZona", 
                            "IdServicio"];
    
    public function zonaficha(){
        return $this->belongsTo('App\Zona', 'IdZona');
    }
    public function servicioficha(){
        return $this->belongsTo('App\Servicio', 'IdServicio');
    }
    public function usuarioficha(){
        return $this->belongsTo('App\User', 'IdUsuario');
    }

    protected $casts = [
        'FechaInscripcion' => 'date',
    ];
}
