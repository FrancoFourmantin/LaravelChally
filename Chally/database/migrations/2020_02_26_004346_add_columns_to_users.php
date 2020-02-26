<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('fecha_nacimiento');
            $table->char('sexo');
            $table->string('apellido' , 100);
            $table->string('username' , 100)->charset('utf8');
            $table->string('avatar' , 100);
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
                $table->dropColumn('fecha_nacimiento');
                $table->dropColumn('sexo');    
                $table->dropColumn('apellido');
                $table->dropColumn('username');    
                $table->dropColumn('avatar');
                  
        });
    }
}
