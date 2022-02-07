<?php

namespace App\Models\Auxiliares;

use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use Illuminate\Database\Eloquent\Model;

class cfgTablaAuxiliar extends Model
{
    protected $fillable = [
        'cod_tabla_auxiliar',
    	'nombre',
    	'observacion',
    	'id_usuario_crea',
    	'fecha_crea'
    ];

    public function cfgTablaAuxiliarDetalle()
    {
        return $this->hasMany(cfgTablaAuxiliarDetalle::class, 'cod_tabla_auxiliar');
    }

    
    
}
