<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\ApiController;
use App\Models\Maestros\maeProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class ProductoController extends ApiController
{
    
    // falta paginado
    public function listado(Request $request)
    {
        
        $idsCategoria = $request->idsCategoria;
        $precioDesde = $request->precioDesde;
        $precioHasta = $request->precioHasta;
        $nombre = $request->nombre;

        $idCategoria = explode(",", $idsCategoria);

        $a = Arr::collapse([$idCategoria]);

        $listado = maeProducto:: orderby ('mae_productos.id', 'asc') -> select ('mae_productos.*')
        ->join( 'mae_categoria_productos', 'mae_productos.categoria_id', '=', 'mae_categoria_productos.id' )
        ->where('mae_productos.nombre','like', '%'.$nombre. '%' )
        ->whereIn('mae_categoria_productos.id', $a)
        ->whereBetween('mae_productos.precio', array($precioDesde, $precioHasta))
        ->get();

        return $this->showAllPagProducto($listado);
    }

    public function topPopulares()
    {
        $data = DB::select("call getProductosPopulares()");

        for ($i = 0; $i <= sizeof($data); $i++) {
           $data2= json_decode(json_encode($data), true);
           $producto = maeProducto::find($data2);
        }
        return response()->json($producto);

    }

    public function topRecomendados()
    {
        $recomendado = maeProducto:: orderby ('nombre', 'asc') -> select ('*') 
        -> where('ind_recomendado','=',true)
        -> limit(4) -> get ();

        return response()->json($recomendado);
    }
    
    public function create(Request $request )
    {

        $rules = [
            'nombre' => 'required',
            'descripcion'  => 'required',
            'foto'  => 'required',
            'precio'  => 'required',
            'ind_recomendado'  => 'required',
            'id_usuario_crea'  => 'required',
            'estado_id'  => 'required',
            'estado_cod_tabla_auxiliar'  => 'required',
            'categoria_id' => 'required',
            'fecha_crea'
        ];

        $campos = $request->all();
        $campos['fecha_crea'] = now();
        $campos['foto'] =$request->foto-> getClientOriginalName();
        $file = $request->foto;
        $nombre = $file->getClientOriginalName();
        \Storage::disk('images4')->put($nombre,  \File::get($file));


        $producto = maeProducto::create($campos);
        return $this->showOne($producto);

    }

    public function show($id)
    {
        $producto = maeProducto::find($id);

        return $this->showOne($producto);
    }

    public function verFoto($foto){

        return Image::make(public_path('images/productos/' . $foto))->response();
    }
}
