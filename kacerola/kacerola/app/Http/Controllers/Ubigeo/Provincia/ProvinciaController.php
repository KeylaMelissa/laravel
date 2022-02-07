<?php

namespace App\Http\Controllers\Ubigeo\Provincia;

use App\Http\Controllers\ApiController;
use App\Models\Ubigeo\maeDepartamento;
use App\Models\Ubigeo\maeProvincia;
use Illuminate\Http\Request;

class ProvinciaController extends ApiController
{
    public function autocompletadoProvincia($term, $idDepartamento){


      if($term == ''){
         $provincias = maeProvincia::orderby('nombre','asc')->select('id','nombre')->get();
      }else{
         $provincias = maeProvincia::orderby('nombre','asc')->select('mae_provincias.id','mae_provincias.nombre')
         ->join( 'mae_departamentos', 'mae_provincias.departamento_id', '=', 'mae_departamentos.id' )
         ->where('mae_provincias.nombre', 'like', '%' .$term . '%')
         ->where('mae_departamentos.id', '=', $idDepartamento )
         ->get();
      }

      return response()->json($provincias);
   }
}
