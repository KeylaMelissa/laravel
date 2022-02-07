<?php

namespace App\Http\Controllers\TablaAuxiliarDetalle;

use App\Http\Controllers\ApiController;
use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use Illuminate\Http\Request;

class TablaAuxiliarDetalleController extends ApiController
{
   
    public function index()
    {
        //
    }

    public function autocompletado(Request $request){

      $nombre = $request->nombre;
      $codTablaAuxiliar = $request->codTablaAuxiliar;

      if($codTablaAuxiliar == ''){
         $auxiliar = cfgTablaAuxiliarDetalle::orderby('nombre','asc')->select('id','nombre')->get();
      }else{
         $auxiliar = cfgTablaAuxiliarDetalle::orderby('nombre','asc')->select('cfg_tabla_auxiliar_detalles.id','cfg_tabla_auxiliar_detalles.cod_tabla_auxiliar','cfg_tabla_auxiliar_detalles.nombre')
         ->join( 'cfg_tabla_auxiliars', 'cfg_tabla_auxiliar_detalles.cod_tabla_auxiliar', '=', 'cfg_tabla_auxiliars.cod_tabla_auxiliar' )
         ->where('cfg_tabla_auxiliar_detalles.nombre', 'like', '%' .$nombre . '%')
         ->where('cfg_tabla_auxiliars.cod_tabla_auxiliar', '=', $codTablaAuxiliar )
         ->get();
      }

      return response()->json($auxiliar);
   }

   public function show(Request $request){

      $nombre = $request->nombre;
      $codTablaAuxiliar = $request->codTablaAuxiliar;

      if($codTablaAuxiliar == ''){
         $auxiliar = cfgTablaAuxiliarDetalle::orderby('nombre','asc')->select('id','nombre')->get();
      }else{
         $auxiliar = cfgTablaAuxiliarDetalle::orderby('nombre','asc')->select('cfg_tabla_auxiliar_detalles.id','cfg_tabla_auxiliar_detalles.cod_tabla_auxiliar','cfg_tabla_auxiliar_detalles.nombre')
         ->join( 'cfg_tabla_auxiliars', 'cfg_tabla_auxiliar_detalles.cod_tabla_auxiliar', '=', 'cfg_tabla_auxiliars.cod_tabla_auxiliar' )
         ->where('cfg_tabla_auxiliar_detalles.nombre', '=',$nombre)
         ->where('cfg_tabla_auxiliars.cod_tabla_auxiliar', '=', $codTablaAuxiliar )
         ->get();
      }

      return response()->json($auxiliar);
   }

   public function comboBox(Request $request){

      $codTablaAuxiliar = $request->codTablaAuxiliar;

      if($codTablaAuxiliar == ''){
         $auxiliar = cfgTablaAuxiliarDetalle::orderby('nombre','asc')->select('id','nombre')->get();
      }else{
         $auxiliar = cfgTablaAuxiliarDetalle::orderby('nombre','asc')->select('cfg_tabla_auxiliar_detalles.id','cfg_tabla_auxiliar_detalles.cod_tabla_auxiliar','cfg_tabla_auxiliar_detalles.nombre')
         ->join( 'cfg_tabla_auxiliars', 'cfg_tabla_auxiliar_detalles.cod_tabla_auxiliar', '=', 'cfg_tabla_auxiliars.cod_tabla_auxiliar' )
         ->where('cfg_tabla_auxiliars.cod_tabla_auxiliar', '=', $codTablaAuxiliar )
         ->get();
      }

      return response()->json($auxiliar);
   }
    
}
