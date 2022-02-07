<?php

namespace App\Models\Maestros;

use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use App\Models\CarroCompra\carCarroCompraDetalle;
use App\Models\Maestros\maeCategoriaProducto;
use Illuminate\Database\Eloquent\Model;

class maeProducto extends Model
{
    public $timestamps = false;

    protected $fillable = [
    	'nombre',
    	'descripcion',
    	'foto',
    	'precio',
    	'ind_recomendado',
    	'id_usuario_crea',
    	'id_usuario_modifica',
        'fecha_crea',
        'fecha_modifica',
        'estado_id',
        'estado_cod_tabla_auxiliar',
    	'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(maeCategoriaProducto::class, 'categoria_id');
    }

    public function estado()
    {
        return $this->belongsTo(cfgTablaAuxiliarDetalle::class, 'estado_id');
    }

     public function carCarroCompraDetalles()
    {
        return $this->belongsTo(carCarroCompraDetalle::class, 'id');
    }
}
