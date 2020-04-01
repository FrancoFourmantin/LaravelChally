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

        ]);

        DB::table('categorias')->insert([
            'nombre' => "Diseño",
            'imagen' => "img-diseno.jpg",
        ]);


        DB::table('categorias')->insert([
            'nombre' => "Arte e Ilustración",
            'imagen' => "img-ilustracion.jpg",

        ]);
        
        DB::table('categorias')->insert([
            'nombre' => "Programación y Lógica",
            'imagen' => "img-programacion.jpg",
        ]);


        DB::table('categorias')->insert([
            'nombre' => "Fotografía",
            'imagen' => "img-fotografia.jpg",
        ]);

        


        DB::table('categorias')->insert([
            'nombre' => "Diseño Gráfico",
            'parent_id' => 2,
            'imagen' => "img-diseno-grafico.jpg"

        ]);

        DB::table('categorias')->insert([
            'nombre' => "Diseño Web",
            'parent_id' => 2,
            'imagen' => "img-diseno-web.jpg"
            ]);

        DB::table('categorias')->insert([
            'nombre' => "Diseño de Interacción UX/UI",
            'parent_id' => 2
        ]);        

        DB::table('categorias')->insert([
            'nombre' => "Diseño Audiovisual",
            'parent_id' => 2
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Artes plásticas",
            'parent_id' => 3
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Ilustración de personajes",
            'parent_id' => 3
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Caricaturas",
            'parent_id' => 3
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Arte conceptual",
            'parent_id' => 3
        ]);


        DB::table('categorias')->insert([
            'nombre' => "JavaScript",
            'parent_id' => 4
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Python",
            'parent_id' => 4
        ]);

        DB::table('categorias')->insert([
            'nombre' => "C++",
            'parent_id' => 4
        ]);

        DB::table('categorias')->insert([
            'nombre' => ".NET",
            'parent_id' => 4
        ]);

        DB::table('categorias')->insert([
            'nombre' => "PHP",
            'parent_id' => 4
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Otros",
            'parent_id' => 4
        ]);        


        DB::table('categorias')->insert([
            'nombre' => "Figura Humana",
            'parent_id' => 5
        ]);        

        DB::table('categorias')->insert([
            'nombre' => "Paisajes",
            'parent_id' => 5
        ]); 

        DB::table('categorias')->insert([
            'nombre' => "Casual",
            'parent_id' => 5
        ]);         



    }
}
