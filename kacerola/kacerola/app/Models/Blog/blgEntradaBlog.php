<?php

namespace App\Models\Blog;

use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use App\Models\Blog\blgCategoriaEntradaBlog;
use Illuminate\Database\Eloquent\Model;

class blgEntradaBlog extends Model
{
        public $timestamps = false;

    protected $fillable = [
    	'titulo',
    	'cuerpo',
    	'foto_lista',
    	'foto_cuerpo',
    	'ind_recomendado',
    	'id_usuario_crea',
    	'id_usuario_modifica',
        'fecha_crea',
        'fecha_modifica',
        'estado_entrada_blog_cod_tabla_auxiliar',
        'estado_entrada_blog_id',
        'categoria_id'
    	
    ];

    public function estadoEntradaBlog()
    {
        return $this->belongsTo(cfgTablaAuxiliarDetalle::class, 'estado_entrada_blog_id');
    }

    public function categoria()
    {
        return $this->belongsTo(blgCategoriaEntradaBlog::class, 'categoria_id');
    }

}
