<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCfgParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfg_parametros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('valor');
            $table->integer('id_usuario_crea');
            $table->integer('id_usuario_modifica')->nullable();
            $table->integer('estado_id');
            $table->string('estado_cod_tabla_auxiliar',6);
            $table->datetime('fecha_crea');
            $table->datetime('fecha_modifica')->nullable();

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
        Schema::dropIfExists('cfg_parametros');
    }
}
