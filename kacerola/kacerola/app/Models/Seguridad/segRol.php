<?php

namespace App\Models\Seguridad;

use App\Models\Seguridad\segUsuario;
use Illuminate\Database\Eloquent\Model;

class segRol extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public function segUsuarios()
    {
    	return $this->belongsToMany(segUsuario::class);
    }
}
