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
            "_lft" => 1,
            "_rgt" => 2
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Diseño",
            'imagen' => "img-diseno.jpg",
            "_lft" => 3,
            "_rgt" => 10
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Arte e Ilustración",
            'imagen' => "img-ilustracion.jpg",
            "_lft" => 11,
            "_rgt" => 20
        ]);

                
        DB::table('categorias')->insert([
            'nombre' => "Programación y Lógica",
            'imagen' => "img-programacion.jpg",
            "_lft" => 21,
            "_rgt" => 34
        ]);

        
        DB::table('categorias')->insert([
            'nombre' => "Fotografía",
            'imagen' => "img-fotografia.jpg",
            "_lft" => 35,
            "_rgt" => 42
        ]);



        DB::table('categorias')->insert([
            'nombre' => "Diseño Gráfico",
            'parent_id' => 2,
            'imagen' => "img-diseno-grafico.jpg",
            "_lft" => 4,
            "_rgt" => 5

        ]);

        DB::table('categorias')->insert([
            'nombre' => "Diseño Web",
            'parent_id' => 2,
            'imagen' => "img-diseno-web.jpg",
            "_lft" => 6,
            "_rgt" => 7
            ]);

        DB::table('categorias')->insert([
            'nombre' => "Diseño de Interacción UX/UI",
            'parent_id' => 2,
            "_lft" => 7,
            "_rgt" => 8
        ]);        

        DB::table('categorias')->insert([
            'nombre' => "Diseño Audiovisual",
            'parent_id' => 2,
            "_lft" => 8,
            "_rgt" => 9
        ]);






        DB::table('categorias')->insert([
            'nombre' => "Artes plásticas",
            'parent_id' => 3,
            "_lft" => 12,
            "_rgt" => 13
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Ilustración de personajes",
            'parent_id' => 3,
            "_lft" => 14,
            "_rgt" => 15
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Caricaturas",
            'parent_id' => 3,
            "_lft" => 16,
            "_rgt" => 17
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Arte conceptual",
            'parent_id' => 3,
            "_lft" => 18,
            "_rgt" => 19
        ]);



        
        DB::table('categorias')->insert([
            'nombre' => "JavaScript",
            'parent_id' => 4,
            "_lft" => 22,
            "_rgt" => 23
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Python",
            'parent_id' => 4,
            "_lft" => 24,
            "_rgt" => 25
        ]);

        DB::table('categorias')->insert([
            'nombre' => "C++",
            'parent_id' => 4,
            "_lft" => 26,
            "_rgt" => 27
        ]);

        DB::table('categorias')->insert([
            'nombre' => ".NET",
            'parent_id' => 4,
            "_lft" => 28,
            "_rgt" => 29
        ]);

        DB::table('categorias')->insert([
            'nombre' => "PHP",
            'parent_id' => 4,
            "_lft" => 30,
            "_rgt" => 31
        ]);

        DB::table('categorias')->insert([
            'nombre' => "Otros",
            'parent_id' => 4,
            "_lft" => 32,
            "_rgt" => 33
        ]);        


        
        DB::table('categorias')->insert([
            'nombre' => "Figura Humana",
            'parent_id' => 5,
            "_lft" => 36,
            "_rgt" => 37
        ]);        

        DB::table('categorias')->insert([
            'nombre' => "Paisajes",
            'parent_id' => 5,
            "_lft" => 38,
            "_rgt" => 39
        ]); 

        DB::table('categorias')->insert([
            'nombre' => "Casual",
            'parent_id' => 5,
            "_lft" => 40,
            "_rgt" => 41
        ]);         
        










    }
}
