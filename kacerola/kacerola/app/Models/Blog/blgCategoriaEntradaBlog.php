<?php

namespace App\Models\Blog;

use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use App\Models\Blog\blgEntradaBlog;
use Illuminate\Database\Eloquent\Model;

class blgCategoriaEntradaBlog extends Model
{
    protected $fillable = [
    	'nombre',
    	'id_usuario_crea',
    	'id_usuario_modifica',
        'fecha_crea',
        'fecha_modifica',
        'estado_cod_tabla_auxiliar',
        'estado_id'
    	
    ];

    public function estado()
    {
        return $this->belongsTo(cfgTablaAuxiliarDetalle::class, 'estado_id');
    }

    public function blgEntradaBlogs()
    {
        return $this->hasMany(blgEntradaBlog::class, 'id');
    }
}
