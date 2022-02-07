<?php

namespace App\Http\Controllers\Ubigeo\Distrito;

use App\Http\Controllers\ApiController;
use App\Models\Ubigeo\maeDistrito;
use Illuminate\Http\Request;

class DistritoController extends ApiController
{
   public function autocompletadoDistrito($term, $idProvincia){

      if($term == ''){
         $distritos = maeDistrito::orderby('nombre','asc')->select('id','nombre')->get();
      }else{
         $distritos = maeDistrito::orderby('nombre','asc')->select('mae_distritos.id','mae_distritos.nombre')
         ->join( 'mae_provincias', 'mae_distritos.provincia_id', '=', 'mae_provincias.id' )
         ->where('mae_distritos.nombre', 'like', '%' .$term . '%')
         ->where('mae_provincias.id', '=', $idProvincia )
         ->get();
      }

      return response()->json($distritos);
   }
}
