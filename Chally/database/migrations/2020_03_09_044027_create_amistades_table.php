<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmistadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amistades', function (Blueprint $table) {
            $table->bigIncrements('id_amistad');
            $table->timestamps();
            $table->unsignedBigInteger('id_usuario_1');
            $table->unsignedBigInteger('id_usuario_2');
            $table->foreign('id_usuario_1')->references('id_usuario')->on('usuarios');
            $table->foreign('id_usuario_2')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amistades');
    }
}
