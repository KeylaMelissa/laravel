<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seg_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('enabled');
            $table->string('password');
            $table->integer('cliente_id')->unsigned()->nullable();

            $table->foreign('cliente_id')->references('id')->on('mae_clientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seg_usuarios');
    }
}
