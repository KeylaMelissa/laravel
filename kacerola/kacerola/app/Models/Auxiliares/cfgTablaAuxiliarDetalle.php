<?php

namespace App\Models\Auxiliares;

use App\Models\Auxiliares\cfgFotoWeb;
use App\Models\Auxiliares\cfgParametro;
use App\Models\Auxiliares\cfgTablaAuxiliar;
use App\Models\Blog\blgCategoriaEntradaBlog;
use App\Models\Blog\blgEntradaBlog;
use App\Models\CarroCompra\carCarroCompra;
use App\Models\CarroCompra\carCarroCompraDetalle;
use App\Models\Maestros\maeCategoriaProducto;
use App\Models\Maestros\maeCliente;
use App\Models\Maestros\maeHorarioAtencion;
use App\Models\Maestros\maeProducto;
use Illuminate\Database\Eloquent\Model;

class cfgTablaAuxiliarDetalle extends Model
{
    protected $fillable = [
    	'abreviatura',
    	'nombre',
    	'observacion',
    	'id_usuario_crea',
    	'valor',
        'fecha_crea',
        'cod_tabla_auxiliar'
    ];

    public function cfgTablaAuxiliar()
    {
        return $this->belongsTo(cfgTablaAuxiliar::class, 'cod_tabla_auxiliar','cod_tabla_auxiliar');
    }

    public function maeCategoriaProductos()
    {
        return $this->hasMany(maeCategoriaProducto::class);
    }

    public function maeProductos()
    {
        return $this->hasMany(maeProducto::class, 'id');
    }

    public function cfgParametros()
    {
        return $this->hasMany(cfgParametro::class, 'id');
    }

    public function cfgFotoWebs()
    {
        return $this->hasMany(cfgFotoWeb::class, 'id');
    }

    public function maeHorarioAtenciones()
    {
        return $this->hasMany(maeHorarioAtencion::class, 'id');
    }

    public function maeClientes()
    {
        return $this->hasMany(maeCliente::class, 'id');
    }

    public function blgCategoriaEntradaBlogs()
    {
        return $this->hasMany(blgCategoriaEntradaBlog::class, 'id');
    }

    public function blgEntradaBlogs()
    {
        return $this->hasMany(blgEntradaBlog::class, 'id');
    }

    public function carCarroCompraForma()
    {
        return $this->hasMany(carCarroCompra::class, 'id');
    }
    public function carCarroCompraTipo()
    {
        return $this->hasMany(carCarroCompra::class, 'id');
    }

    public function carCarroCompraEstado()
    {
        return $this->hasMany(carCarroCompra::class, 'id');
    }

     public function carCarroCompraDetalles()
    {
        return $this->hasMany(carCarroCompraDetalle::class, 'id');
    }
}
