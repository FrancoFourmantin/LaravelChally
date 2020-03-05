<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class desafiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desafios')->insert([
            'nombre' => "Crea un poster alternativo inspirado en Joker",
            'imagen' => "desafio-joker.jpg",
            'id_categoria' => 1,
            'id_autor' => 1,
            'descripcion' => 'Se invita a artistas, diseñadores e ilustradores  a crear material gráfico único para Joker inspirado en las últimas imágenes y avances de la película. ¡También se alienta a los artistas a grabar y enviar videos de time-lapse de su trabajo para que los fans puedan ver cómo el arte cobra vida! </br></br>

            Los artistas pueden descargar el Paquete de Recursos desde https://tlnt.at/2LfTS4d para obtener inspiración y referencias visuales de los personajes que aparecen en la película.',
            'requisitos' => '· Los diseños serán presentados en JPEG o PNG con un tamaño máximo de 10MB. </br>
            · Todas las presentaciones deben ser material gráfico original (es decir, no utilizar materiales preexistentes de terceros, ya sea de stock o protegidos por derechos de autor). </br> 
            · Los Artistas pueden representar retratos de los personajes de Guasón y pueden incluir el logotipo del título de Guasón en su material gráfico. Todos los derechos sobre y para los personajes y el logotipo del título están reservados por Warner Bros. Pictures.',
            'dificultad' => '2',
            'fecha_limite' => '2020-03-06',
            'fecha_creacion' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_actualizacion' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('desafios')->insert([
            'nombre' => "Crea un logo para un equipo de basket ficticio",
            'imagen' => "desafio-equipo.jpg",
            'id_categoria' => 1,
            'id_autor' => 1,
            'descripcion' => 'Se invita a artistas, diseñadores e ilustradores  a crear material gráfico único para Joker inspirado en las últimas imágenes y avances de la película. ¡También se alienta a los artistas a grabar y enviar videos de time-lapse de su trabajo para que los fans puedan ver cómo el arte cobra vida! </br></br>

            Los artistas pueden descargar el Paquete de Recursos desde https://tlnt.at/2LfTS4d para obtener inspiración y referencias visuales de los personajes que aparecen en la película.',
            'requisitos' => '· Los diseños serán presentados en JPEG o PNG con un tamaño máximo de 10MB. </br>
            · Todas las presentaciones deben ser material gráfico original (es decir, no utilizar materiales preexistentes de terceros, ya sea de stock o protegidos por derechos de autor). </br> 
            · Los Artistas pueden representar retratos de los personajes de Guasón y pueden incluir el logotipo del título de Guasón en su material gráfico. Todos los derechos sobre y para los personajes y el logotipo del título están reservados por Warner Bros. Pictures.',
            'dificultad' => '2',
            'fecha_limite' => '2020-03-06',
            'fecha_creacion' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_actualizacion' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('desafios')->insert([
            'nombre' => "Crea un poster de prueba XD",
            'imagen' => "desafio-joker.jpg",
            'id_categoria' => 1,
            'id_autor' => 1,
            'descripcion' => 'Se invita a artistas, diseñadores e ilustradores  a crear material gráfico único para Joker inspirado en las últimas imágenes y avances de la película. ¡También se alienta a los artistas a grabar y enviar videos de time-lapse de su trabajo para que los fans puedan ver cómo el arte cobra vida! </br></br>

            Los artistas pueden descargar el Paquete de Recursos desde https://tlnt.at/2LfTS4d para obtener inspiración y referencias visuales de los personajes que aparecen en la película.',
            'requisitos' => '· Los diseños serán presentados en JPEG o PNG con un tamaño máximo de 10MB. </br>
            · Todas las presentaciones deben ser material gráfico original (es decir, no utilizar materiales preexistentes de terceros, ya sea de stock o protegidos por derechos de autor). </br> 
            · Los Artistas pueden representar retratos de los personajes de Guasón y pueden incluir el logotipo del título de Guasón en su material gráfico. Todos los derechos sobre y para los personajes y el logotipo del título están reservados por Warner Bros. Pictures.',
            'dificultad' => '2',
            'fecha_limite' => '2020-03-06',
            'fecha_creacion' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_actualizacion' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);




    }
}
