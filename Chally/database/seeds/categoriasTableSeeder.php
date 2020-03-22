<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => "Diseño e Ilustración",
            'imagen' => "img-diseno.jpg",
            "_lft" => 1,
            '_rgt' => 2
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Fotografía",
            'imagen' => "img-diseno-ilustracion.jpg",
            '_lft' => 3,
            '_rgt' => 4
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Programación y Lógica",
            'imagen' => "img-programacion.jpg",
            '_lft' => 5,
            '_rgt' => 6
        ]);
    }
}
