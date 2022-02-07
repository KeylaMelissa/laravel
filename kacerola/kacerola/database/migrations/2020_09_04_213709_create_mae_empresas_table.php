<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruc');
            $table->string('nombre');
            $table->string('abreviatura');
            $table->string('direccion');
            $table->string('referencia');
            $table->string('correo_contacto');
            $table->string('correo_venta');
            $table->string('telefono');
            $table->string('logo');
            $table->string('url_facebook');
            $table->string('url_twitter');
            $table->string('url_instagram');
            $table->string('url_whatsapp');
            $table->integer('id_usuario_crea');
            $table->integer('id_usuario_modifica')->nullable();
            $table->datetime('fecha_crea');
            $table->datetime('fecha_modifica')->nullable();
            $table->integer('distrito_id')->unsigned();


            $table->foreign('distrito_id')->references('id')->on('mae_distritos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_empresas');
    }
}
