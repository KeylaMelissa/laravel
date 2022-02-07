<?php

namespace App\Http\Controllers\CarroCompra;

use App\Http\Controllers\ApiController;
use App\Models\CarroCompra\carCarroCompra;
use Illuminate\Http\Request;

class CarroCompraController extends ApiController
{
   
    public function show($id)
    {
        $carro = carCarroCompra::find($id);
        $carro = carCarroCompra::select ('car_carro_compras.*')
                 ->where('car_carro_compras.id','=', $id )
                 ->with('horario')
                 ->get();

        return $this->showAll($carro);
    }

    public function create(Request $request )
    {

        $rules = [
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'direccion' => 'required',
            'fecha_entrega' => 'required',
            'monto_contraentrega' => 'required',
            'monto_delivery' => 'required',
            'total' => 'required',
            'total_delivery' => 'required',
            'id_usuario_crea' => 'required',
            'estado_carro_compra_id' => 'required',
            'estado_carro_compra_cod_tabla_auxiliar' => 'required',
            'forma_pago_id' => 'required', 
            'forma_pago_cod_tabla_auxiliar' => 'required',  
            'tipo_documento_id' => 'required', 
            'tipo_documento_cod_tabla_auxiliar' => 'required',
            'cliente_id' => 'required',
            'horario_id' => 'required',
            'fecha_crea'
        ];

        $campos = $request->all();
        $campos['fecha_crea'] = now();

        $carro = carCarroCompra::create($campos);
        return $this->showOne($carro);

    }

    public function update(Request $request, $id)
    {
        $carro = carCarroCompra::where('id', '=', $id)->first();
        $carro->fecha_modifica = now();

        $carro->update($request->all());
        
        return $this->showOne($carro);
    }    
}
