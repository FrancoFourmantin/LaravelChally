<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Desafio;
use App\Usuario;
use App\Categoria;
use Faker\Generator as Faker;

$factory->define(Desafio::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'requisitos'=>"<li>" . $faker->sentence($nbWords = 6, $variableNbWords = true) . "</li>",
        'dificultad'=>$faker->numberBetween($min = 1, $max = 3),
        'id_autor' => Usuario::all(['id_usuario'])->random(),
        'id_categoria' => Categoria::all(['id'])->where('parent_id','=',null)->random(),
        'id_subcategoria' => "1",
        'descripcion'=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'imagen'=>'https://source.unsplash.com/random/678x300?sig='.$faker->numberBetween($min = 100, $max = 199),
        'fecha_limite'=> $faker->date($format = 'Y-m-d', $min='now' ,$max = '+2 years'),
        'fecha_actualizacion'=> null,
        'fecha_creacion' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
    ];
});
