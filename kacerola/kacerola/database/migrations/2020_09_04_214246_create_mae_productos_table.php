<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('foto');
            $table->double('precio');
            $table->boolean('ind_recomendado');
            $table->integer('id_usuario_crea');
            $table->integer('id_usuario_modifica')->nullable();
            $table->integer('categoria_id')->unsigned();
            $table->integer('estado_id');
            $table->string('estado_cod_tabla_auxiliar',6);
            $table->datetime('fecha_crea');
            $table->datetime('fecha_modifica')->nullable();

            $table->foreign('categoria_id')->references('id')->on('mae_categoria_productos');

            $table->foreign('estado_id')->references('id')->on('cfg_tabla_auxiliar_detalles');
            $table->foreign('estado_cod_tabla_auxiliar')->references('cod_tabla_auxiliar')->on('cfg_tabla_auxiliar_detalles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_productos');
    }
}
