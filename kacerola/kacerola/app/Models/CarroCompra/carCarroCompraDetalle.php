<?php

namespace App\Models\CarroCompra;

use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use App\Models\CarroCompra\carCarroCompra;
use App\Models\Maestros\maeCliente;
use App\Models\Maestros\maeHorarioAtencion;
use App\Models\Maestros\maeProducto;
use Illuminate\Database\Eloquent\Model;

class carCarroCompraDetalle extends Model
{
    protected $fillable = [
    	'cantidad',
    	'precio_unitario',
    	'precio_total',
    	'id_usuario_crea',
    	'id_usuario_modifica',
        'fecha_crea',
        'fecha_modifica'
    	
    ];

    public function carCarroCompras()
    {
        return $this->hasMany(carCarroCompra::class, 'carro_compra_id');
    }

    public function producto()
    {
        return $this->belongsTo(maeProducto::class, 'producto_id');
    }


}
