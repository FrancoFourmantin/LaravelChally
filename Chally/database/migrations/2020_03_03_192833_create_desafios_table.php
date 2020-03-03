<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesafiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desafios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('requisitos');
            $table->integer('dificultad');
            $table->unsignedbigInteger('id_autor');
            $table->integer('id_categoria');
            $table->integer('id_respuesta_ganadora')->nullable();
            $table->string('descripcion');
            $table->string('imagen');
            $table->date('fecha_limite');
            $table->timestamp('fecha_actualizacion')->nullable();
            $table->timestamp('fecha_creacion')->nullable();

            $table->foreign('id_autor')->references('id_usuario')->on('usuarios');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desafios');
    }
}
