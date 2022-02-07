<?php

namespace App\Models\Auxiliares;

use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use Illuminate\Database\Eloquent\Model;

class cfgParametro extends Model
{
     protected $fillable = [
    	'nombre',
    	'valor',
    	'id_usuario_crea',
    	'id_usuario_modifica',
        'fecha_crea',
        'fecha_modifica',
        'estado_cod_tabla_auxiliar'
    ];

    public function estado()
    {
        return $this->belongsTo(cfgTablaAuxiliarDetalle::class, 'estado_id' );
    }



    
}
