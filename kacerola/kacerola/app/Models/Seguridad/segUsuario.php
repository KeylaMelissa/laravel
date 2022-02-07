<?php

namespace App\Models\Seguridad;

use App\Models\Seguridad\segRol;
use Illuminate\Database\Eloquent\Model;

class segUsuario extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'username',
        'enabled', 
        'password',
        'cliente_id'
    ];

    protected $hidden = [
        'password'
    ];

	public function segRoles()
    {
    	return $this->belongsTo(segRol::class,'id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
