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
            'imagen' => "img-diseno.jpg"
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Fotografía",
            'imagen' => "img-diseno-ilustracion.jpg"
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Programación y Lógica",
            'imagen' => "img-programacion.jpg"
        ]);

    }
}
