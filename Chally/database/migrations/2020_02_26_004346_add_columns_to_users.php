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
            $table->string('apellido' , 100)->nullable();
            $table->string('username' , 100)->charset('utf8')->unique();
            $table->string('avatar' , 100);
            $table->string('cover' , 100)->nullable();
            $table->string('bio',999)->nullable();
            $table->string('link_linkedin')->nullable();
            $table->string('link_behance')->nullable();
            $table->string('link_github')->nullable();
            $table->string('link_website')->nullable();   
            $table->string('role')->default('user');
            $table->string('subscribed');
            $table->string('subscription_token');
            $table->uuid('verification_token');

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
                $table->dropColumn('cover');
                $table->dropColumn('bio');
                $table->dropColumn('link_linkedin');
                $table->dropColumn('link_behance');
                $table->dropColumn('link_github');
                $table->dropColumn('link_website');
                $table->dropColumn('subscribed');
                $table->dropColumn('subscription_token');

        });
    }
}
