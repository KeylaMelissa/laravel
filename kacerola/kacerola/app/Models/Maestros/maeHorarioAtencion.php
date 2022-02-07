<?php

namespace App\Models\Maestros;

use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use App\Models\CarroCompra\carCarroCompra;
use App\Models\CarroCompra\carCarroCompraDetalle;
use Illuminate\Database\Eloquent\Model;

class maeHorarioAtencion extends Model
{
    protected $fillable = [
    	'hora_inicio',
    	'hora_fin',
    	'id_usuario_crea',
    	'id_usuario_modifica',
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
        return $this->belongsTo(carCarroCompra::class, 'id');
    }
}
