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
            'slug' => 'saca-una-foto-con-onda-vaporwave-en-buenos-aires-1590532785',
            'imagen' => "portada-desafio1.jpg",
            'id_categoria' => 2,
            'id_subcategoria' => 6,
            'id_autor' => 2,
            'descripcion' => 'Sacá una foto con tu celu o cámara réflex de un punto de la Ciudad que tenga una onda Vaporwave/Aesthetics. </br></br>

            Se permite realizar retoque digital para realzar los colores',
            'requisitos' => '<li> Subir una foto </li> <li> Indicá en qué dirección sacaste la foto </li> <li> Si usaste un programa de edición, indicá cual fue </li>',
            'dificultad' => 1,
            'fecha_limite' => '2020-05-21',
            'fecha_creacion' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_actualizacion' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('desafios')->insert([
            'nombre' => "Crea un póster alternativo para la película Joker",
            'slug' => "crea-un-poster-alternativo-para-la-pelicula-joker-1590532807",
            'imagen' => "portada-desafio2.jpg",
            'id_categoria' => 1,
            'id_subcategoria' => 4,
            'id_autor' => 1,
            'descripcion' => 'Se invita a artistas, diseñadores e ilustradores  a crear material gráfico único para Joker inspirado en las últimas imágenes y avances de la película. ¡También se alienta a los artistas a grabar y enviar videos de time-lapse de su trabajo para que los fans puedan ver cómo el arte cobra vida!

            Los artistas pueden descargar el Paquete de Recursos desde https://tlnt.at/2LfTS4d para obtener inspiración y referencias visuales de los personajes que aparecen en la película.',
            'requisitos' => '<li> Los diseños pueden ser en JPEG o PNG </li> <li> Todas las presentaciones deben ser material gráfico original (es decir, no utilizar materiales preexistentes de terceros, ya sea de stock o protegidos por derechos de autor).</li> <li> Se pueden representar retratos de los personajes de Guasón y pueden incluir el logotipo del título de la pelli en su material gráfico </li>',
            'dificultad' => '2',
            'fecha_limite' => '2020-03-24',
            'fecha_creacion' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_actualizacion' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);





    }
}
