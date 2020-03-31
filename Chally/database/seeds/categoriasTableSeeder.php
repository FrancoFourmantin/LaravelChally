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
            'nombre' => "Varios",
            'imagen' => "",
            "_lft" => 1,
            '_rgt' => 2
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Diseño",
            'imagen' => "img-diseno.jpg",
            "_lft" => 3,
            '_rgt' => 4
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Programación y Lógica",
            'imagen' => "img-programacion.jpg",
            '_lft' => 5,
            '_rgt' => 6
        ]);


        DB::table('categorias')->insert([
            'nombre' => "Fotografía",
            'imagen' => "img-diseno-ilustracion.jpg",
            '_lft' => 7,
            '_rgt' => 8
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Diseño Web",
            'imagen' => "img-diseno.jpg",
            "_lft" => 9,
            '_rgt' => 10,
            'parent_id' => 2
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Diseño Gráfico",
            'imagen' => "img-diseno.jpg",
            "_lft" => 11,
            '_rgt' => 12,
            'parent_id' => 2
        ]);


        DB::table('categorias')->insert([
            'nombre' => "Ilustración",
            'imagen' => "img-diseno.jpg",
            "_lft" => 13,
            '_rgt' => 14,
            'parent_id' => 2
        ]);




    }
}
