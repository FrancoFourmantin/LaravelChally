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
            'nombre' => "Sacá una foto con onda Vaporwave en Buenos Aires",
            'imagen' => "portada-desafio1.jpg",
            'id_categoria' => 2,
            'id_subcategoria' => 6,
            'id_autor' => 2,
            'descripcion' => 'Sacá una foto con tu celu o cámara réflex de un punto de la Ciudad que tenga una onda Vaporwave/Aesthetics. </br></br>

            Se permite realizar retoque digital para realzar los colores',
            'requisitos' => '· Subir una foto </br>
            · Indicar en qué dirección sacaste la foto </br>' ,
            'dificultad' => 1,
            'fecha_limite' => '2020-03-22',
            'fecha_creacion' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_actualizacion' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('desafios')->insert([
            'nombre' => "Crea un póster alternativo para la película Joker",
            'imagen' => "portada-desafio2.jpg",
            'id_categoria' => 1,
            'id_subcategoria' => 4,
            'id_autor' => 1,
            'descripcion' => 'Se invita a artistas, diseñadores e ilustradores  a crear material gráfico único para Joker inspirado en las últimas imágenes y avances de la película. ¡También se alienta a los artistas a grabar y enviar videos de time-lapse de su trabajo para que los fans puedan ver cómo el arte cobra vida! </br></br>

            Los artistas pueden descargar el Paquete de Recursos desde https://tlnt.at/2LfTS4d para obtener inspiración y referencias visuales de los personajes que aparecen en la película.',
            'requisitos' => '· Los diseños serán presentados en JPEG o PNG con un tamaño máximo de 10MB. </br>
            · Todas las presentaciones deben ser material gráfico original (es decir, no utilizar materiales preexistentes de terceros, ya sea de stock o protegidos por derechos de autor). </br> 
            · Los Artistas pueden representar retratos de los personajes de Guasón y pueden incluir el logotipo del título de Guasón en su material gráfico. Todos los derechos sobre y para los personajes y el logotipo del título están reservados por Warner Bros. Pictures.',
            'dificultad' => '2',
            'fecha_limite' => '2020-03-24',
            'fecha_creacion' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_actualizacion' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);





    }
}
