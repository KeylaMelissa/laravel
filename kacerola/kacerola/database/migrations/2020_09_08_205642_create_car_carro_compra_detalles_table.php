<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarCarroCompraDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_carro_compra_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->double('precio_total');
            $table->double('precio_unitario');
            $table->integer('id_usuario_crea');
            $table->integer('id_usuario_modifica')->nullable();
            $table->datetime('fecha_crea');
            $table->datetime('fecha_modifica')->nullable();
            $table->integer('carro_compra_id')->unsigned();
            $table->integer('producto_id')->unsigned();

            $table->foreign('producto_id')->references('id')->on('mae_productos');

            $table->foreign('carro_compra_id')->references('id')->on('car_carro_compras');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_carro_compra_detalles');
    }
}
