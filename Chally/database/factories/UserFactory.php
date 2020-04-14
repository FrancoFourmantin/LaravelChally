<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Usuario;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Usuario::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellido' => $faker->lastName,
        'sexo' => $faker->randomElement($array = array ('h','m')),
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $faker->password, 
        'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = '-20 years'),
        'bio' =>$faker->text($maxNbChars = 200), 
        'avatar' => 'https://source.unsplash.com/random/500x500?sig='.$faker->numberBetween($min = 100, $max = 199),  
    ];
});
