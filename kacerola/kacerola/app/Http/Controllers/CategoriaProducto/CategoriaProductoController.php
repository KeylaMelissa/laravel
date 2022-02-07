<?php

namespace App\Http\Controllers\CategoriaProducto;

use App\Http\Controllers\ApiController;
use App\Models\Maestros\maeCategoriaProducto;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class CategoriaProductoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listado()
    {
        $categoriaP = maeCategoriaProducto::all();

        return $this->showAll($categoriaP);
        //return response()->json($categoriaP);

    }

    
    public function create(Request $request )
    {

        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
            'telefono' => 'required',
            'foto_portada' => 'required',
            'id_usuario_crea' => 'required',
            'estado_id' => 'required',
            'estado_cod_tabla_auxiliar' => 'required',
            'fecha_crea'
        ];

        $campos = $request->all();
        $campos['fecha_crea'] = now();
        $campos['foto_portada'] =$request->foto_portada-> getClientOriginalName();
        $file = $request->foto_portada;
        $nombre = $file->getClientOriginalName();
        \Storage::disk('images3')->put($nombre,  \File::get($file));


        $categoria = maeCategoriaProducto::create($campos);
        return $this->showOne($categoria);

    }

    public function show($id)
    {
        $catproducto = maeCategoriaProducto::find($id);

        return $this->showOne($catproducto);
    }

    public function verFoto($fotoPortada){

        return Image::make(public_path('images/categoria_productos/' . $fotoPortada))->response();
    }
}
