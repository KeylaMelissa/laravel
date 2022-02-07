<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarCarroComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_carro_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('correo');
            $table->string('direccion');
            $table->string('referencia');
            $table->date('fecha_entrega');
            $table->double('monto_contraentrega');
            $table->double('monto_delivery');
            $table->double('total');
            $table->double('total_delivery');
            $table->integer('id_usuario_crea');
            $table->integer('id_usuario_modifica')->nullable();
            $table->datetime('fecha_crea');
            $table->datetime('fecha_modifica')->nullable();
            $table->integer('estado_carro_compra_id');
            $table->string('estado_carro_compra_cod_tabla_auxiliar',6);
            $table->integer('forma_pago_id');
            $table->string('forma_pago_cod_tabla_auxiliar',6);
            $table->integer('tipo_documento_id');
            $table->string('tipo_documento_cod_tabla_auxiliar',6);
            $table->integer('cliente_id')->unsigned();
            $table->integer('horario_id')->unsigned();

            $table->foreign('cliente_id')->references('id')->on('mae_clientes');
            $table->foreign('horario_id')->references('id')->on('mae_horario_atencions');

            $table->foreign('estado_carro_compra_id')->references('id')->on('cfg_tabla_auxiliar_detalles');
            $table->foreign('estado_carro_compra_cod_tabla_auxiliar')->references('cod_tabla_auxiliar')->on('cfg_tabla_auxiliar_detalles');

            $table->foreign('forma_pago_id')->references('id')->on('cfg_tabla_auxiliar_detalles');
            $table->foreign('forma_pago_cod_tabla_auxiliar')->references('cod_tabla_auxiliar')->on('cfg_tabla_auxiliar_detalles');

            $table->foreign('tipo_documento_id')->references('id')->on('cfg_tabla_auxiliar_detalles');
            $table->foreign('tipo_documento_cod_tabla_auxiliar')->references('cod_tabla_auxiliar')->on('cfg_tabla_auxiliar_detalles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_carro_compras');
    }
}
