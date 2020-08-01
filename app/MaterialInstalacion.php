<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialInstalacion extends Model
{
    protected $table = "MaterialInstalacion";
    protected $primaryKey = ['IdFicha', 'IdValorAdicional'];
    public $incrementing = false;
    protected $dateFormat = 'd-m-Y H:i:s';
    protected $fillable = ["IdFicha", "IdValorAdicional", "Cantidad", "CostoUnitario", "Comentario"];

    public function fichamaterialinstalacion(){
        return $this->belongsTo('App\Ficha', 'IdFicha');
    }
    public function valoradicionalmaterialinstalacion(){
        return $this->belongsTo('App\ValorAdicional', 'IdValorAdicional');
    }
    
}
