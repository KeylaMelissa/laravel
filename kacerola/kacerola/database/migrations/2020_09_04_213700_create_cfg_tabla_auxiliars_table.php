<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCfgTablaAuxiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfg_tabla_auxiliars', function (Blueprint $table) {
            $table->string('cod_tabla_auxiliar',6);
            $table->string('nombre');
            $table->string('observacion');
            $table->integer('id_usuario_crea');
            $table->datetime('fecha_crea');

            $table->primary('cod_tabla_auxiliar'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cfg_tabla_auxiliars');
    }
}
