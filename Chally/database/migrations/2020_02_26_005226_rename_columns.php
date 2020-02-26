<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Grammars\RenameColumn;

class RenameColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
                $table->renameColumn('id', 'id_usuario');   
                $table->renameColumn('name', 'nombre');  
                $table->renameColumn('email', 'mail');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('id_usuario', 'id');   
            $table->renameColumn('nombre', 'name');  
            $table->renameColumn('mail', 'email');  
        });
    }
}
