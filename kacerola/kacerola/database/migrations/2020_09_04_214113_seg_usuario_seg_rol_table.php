<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SegUsuarioSegRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seg_usuario_seg_rol', function (Blueprint $table) {
            $table->integer('seg_usuario_id')->unsigned();
            $table->integer('seg_rol_id')->unsigned();

            $table->foreign('seg_usuario_id')->references('id')->on('seg_usuarios');
            $table->foreign('seg_rol_id')->references('id')->on('seg_rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seg_usuario_seg_rol');
    }
}
