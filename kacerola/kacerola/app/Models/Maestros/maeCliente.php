<?php

namespace App\Models\Maestros;

use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use App\Models\CarroCompra\carCarroCompra;
use App\Models\CarroCompra\carCarroCompraDetalle;
use App\Models\Maestros\maeCliente;
use Illuminate\Database\Eloquent\Model;

class maeCliente extends Model
{
    public $timestamps = false;

    
	protected $fillable = [
    	'nombre',
    	'apellido',
    	'telefono',
    	'correo',
    	'direccion',
    	'referencia',
    	'id_usuario_crea',
    	'id_usuario_modifica',
        'estado_id',
        'estado_cod_tabla_auxiliar',
        'fecha_crea',
        'fecha_modifica'
    ];

    public function estado()
    {
        return $this->belongsTo(cfgTablaAuxiliarDetalle::class, 'estado_id');
    }

    public function carCarroCompraDetalles()
    {
        return $this->belongsTo(carCarroCompraDetalle::class);
    }

    public function carCarroCompra()
    {
        return $this->hasMany(carCarroCompra::class, 'id');
    }
}
