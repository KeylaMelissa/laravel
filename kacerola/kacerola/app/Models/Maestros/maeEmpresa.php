<?php

namespace App\Models\Maestros;

use App\Models\Ubigeo\maeDistrito;
use Illuminate\Database\Eloquent\Model;

class maeEmpresa extends Model
{
    protected $fillable = [
    	'ruc',
    	'nombre',
    	'abreviatura',
    	'direccion',
    	'referencia',
    	'correo_contacto',
    	'correo_venta',
    	'telefono',
        'logo',
    	'url_facebook',
    	'url_twitter',
    	'url_instagram',
    	'url_whatsapp',
    	'id_usuario_crea',
    	'id_usuario_modifica',
        'fecha_crea',
        'fecha_modifica',
        'distrito_id'
    ];

    public function distrito()
    {
        return $this->belongsTo(maeDistrito::class, 'distrito_id');
    }
}
