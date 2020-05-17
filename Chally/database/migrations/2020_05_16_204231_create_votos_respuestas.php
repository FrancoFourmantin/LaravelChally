<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotosRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votos_respuestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedbigInteger('id_desafio');
            $table->unsignedbigInteger('id_votante');
            $table->unsignedbigInteger('id_respuesta_votada');
            $table->foreign('id_desafio')->references('id')->on('desafios');
            $table->foreign('id_votante')->references('id_usuario')->on('usuarios');
            $table->foreign('id_respuesta_votada')->references('id')->on('respuestas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votos_respuestas');
    }
}
