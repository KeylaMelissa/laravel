<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlgCategoriaEntradaBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blg_categoria_entrada_blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_usuario_crea');
            $table->integer('id_usuario_modifica')->nullable();
            $table->datetime('fecha_crea');
            $table->datetime('fecha_modifica')->nullable();
            $table->string('estado_cod_tabla_auxiliar',6);
            $table->integer('estado_id');

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
        Schema::dropIfExists('blg_categoria_entrada_blogs');
    }
}
