<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\ApiController;
use App\Models\Auxiliares\cfgTablaAuxiliarDetalle;
use App\Models\Maestros\maeCliente;
use Illuminate\Http\Request;

class ClienteController extends ApiController
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {

        $rules = [
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'id_usuario_crea' => 'required',
            'estado_id' => 'required',
            'estado_cod_tabla_auxiliar' => 'required',
            'fecha_crea'
        ];

        $this-> validate($request,$rules);

        $campos = $request->all();
        $campos['fecha_crea'] = now();
        $cliente = maeCliente::create($campos);

        return $this->showOne($cliente);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = maeCliente::find($id);

        return $this->showOne( $cliente);
    }

    
}
