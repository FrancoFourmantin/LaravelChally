<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_desafio')->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_respuesta')->nullable();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_desafio')->references('id')->on('desafios');   
            $table->foreign('id_respuesta')->references('id')->on('respuestas');
            $table->boolean('like_or_dislike');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
