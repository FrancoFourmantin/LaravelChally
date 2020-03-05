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
            $table->string('requisitos',1000);
            $table->integer('dificultad');
            $table->unsignedbigInteger('id_autor');
            $table->unsignedbigInteger('id_categoria');
            $table->integer('id_respuesta_ganadora')->nullable();
            $table->string('descripcion',1000);
            $table->string('imagen');
            $table->date('fecha_limite');
            $table->timestamp('fecha_actualizacion')->nullable();
            $table->timestamp('fecha_creacion')->nullable();
            $table->foreign('id_autor')->references('id_usuario')->on('usuarios');
            $table->foreign('id_categoria')->references('id')->on('categorias');


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
