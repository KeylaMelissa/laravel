<?php

namespace App\Models\Auxiliares;

use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use Illuminate\Database\Eloquent\Model;

class cfgFotoWeb extends Model
{
    protected $fillable = [
    	'nombre',
    	'nro_orden',
    	'foto',
    	'id_usuario_crea',
    	'id_usuario_modifica',
        'fecha_crea',
        'fecha_modifica'
    ];

    public function seccionWeb()
    {
        return $this->belongsTo(cfgTablaAuxiliarDetalle::class, 'seccion_web_id');
    }
}
