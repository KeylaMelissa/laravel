<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlgEntradaBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blg_entrada_blogs', function (Blueprint $table) {
           $table->increments('id');
            $table->string('titulo');
            $table->string('cuerpo');
            $table->string('foto_lista');
            $table->string('foto_cuerpo');
            $table->boolean('ind_recomendado');
            $table->integer('id_usuario_crea');
            $table->integer('id_usuario_modifica')->nullable();
            $table->datetime('fecha_crea');
            $table->datetime('fecha_modifica')->nullable();
            $table->string('estado_entrada_blog_cod_tabla_auxiliar',6);
            $table->integer('estado_entrada_blog_id');
            $table->integer('categoria_id')->unsigned();

            $table->foreign('categoria_id')->references('id')->on('blg_categoria_entrada_blogs');

            $table->foreign('estado_entrada_blog_id')->references('id')->on('cfg_tabla_auxiliar_detalles');
            $table->foreign('estado_entrada_blog_cod_tabla_auxiliar')->references('cod_tabla_auxiliar')->on('cfg_tabla_auxiliar_detalles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blg_entrada_blogs');
    }
}
