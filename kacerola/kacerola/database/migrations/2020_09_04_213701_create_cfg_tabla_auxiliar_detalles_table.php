<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCfgTablaAuxiliarDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfg_tabla_auxiliar_detalles', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nombre');
            $table->string('abreviatura');
            $table->string('observacion');
            $table->string('valor');
            $table->integer('id_usuario_crea');
            $table->string('cod_tabla_auxiliar',6);
            $table->datetime('fecha_crea');

            $table->primary(array('id','cod_tabla_auxiliar'));

            $table->foreign('cod_tabla_auxiliar')->references('cod_tabla_auxiliar')->on('cfg_tabla_auxiliars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cfg_tabla_auxiliar_detalles');
    }
}
