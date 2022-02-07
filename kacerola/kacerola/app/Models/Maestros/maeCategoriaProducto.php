<?php

namespace App\Models\Maestros;
use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use App\Models\Maestros\maeProducto;
use Illuminate\Database\Eloquent\Model;

class maeCategoriaProducto extends Model
{
    public $timestamps = false;

    protected $fillable = [
    	'nombre',
    	'descripcion',
    	'abreviatura',
    	'foto_portada',
    	'id_usuario_crea',
    	'id_usuario_modifica',
        'fecha_crea',
        'fecha_modifica',
        'estado_id',
        'estado_cod_tabla_auxiliar'
    	
    ];

    public function maeProductos()
    {
        return $this->hasMany(maeProducto::class, 'id');
    }

    public function estado()
    {
        return $this->belongsTo(cfgTablaAuxiliarDetalle::class, 'estado_id');
    }
}
