<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCfgFotoWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfg_foto_webs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('nro_orden');
            $table->string('foto');
            $table->integer('id_usuario_crea');
            $table->integer('id_usuario_modifica')->nullable();
            $table->integer('seccion_web_id');
            $table->string('seccion_web_cod_tabla_auxiliar',6);
            $table->datetime('fecha_crea');
            $table->datetime('fecha_modifica')->nullable();

            $table->foreign('seccion_web_id')->references('id')->on('cfg_tabla_auxiliar_detalles');
            $table->foreign('seccion_web_cod_tabla_auxiliar')->references('cod_tabla_auxiliar')->on('cfg_tabla_auxiliar_detalles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cfg_foto_webs');
    }
}
