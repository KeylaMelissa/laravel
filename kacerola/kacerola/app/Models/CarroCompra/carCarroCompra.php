<?php

namespace App\Models\CarroCompra;

use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use App\Models\CarroCompra\carCarroCompraDetalle;
use App\Models\Maestros\maeCliente;
use App\Models\Maestros\maeHorarioAtencion;
use Illuminate\Database\Eloquent\Model;

class carCarroCompra extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'nombre',
    	'apellido',
    	'telefono',
    	'correo',
    	'direccion',
    	'referencia',
    	'fecha_entrega',
    	'monto_contraentrega',
    	'monto_delivery',
    	'total',
    	'total_delivery',
    	'id_usuario_crea',
    	'id_usuario_modifica',
        'fecha_crea',
        'fecha_modifica',
        'estado_carro_compra_id',
        'estado_carro_compra_cod_tabla_auxiliar',
        'forma_pago_id', 
        'forma_pago_cod_tabla_auxiliar',  
        'tipo_documento_id', 
        'tipo_documento_cod_tabla_auxiliar',
        'cliente_id',
        'horario_id',
    	
    ];

    public function carCarroCompraDetalles()
    {
        return $this->hasMany(carCarroCompraDetalle::class);
    }

    public function horario()
    {
        return $this->belongsTo(maeHorarioAtencion::class, 'horario_id');
    }

    public function cliente()
    {
        return $this->belongsTo(maeCliente::class, 'cliente_id');
    }

    public function formaPago()
    {
        return $this->belongsTo(cfgTablaAuxiliarDetalle::class, 'forma_pago_id');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(cfgTablaAuxiliarDetalle::class, 'tipo_documento_id');
    }

     public function estadoCarroCompra()
    {
        return $this->belongsTo(cfgTablaAuxiliarDetalle::class, 'estado_carro_compra_id');
    }
}
