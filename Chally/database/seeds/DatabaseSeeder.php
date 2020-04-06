<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreacionDeUsuariosDePrueba::class);
        $this->call(categoriasTableSeeder::class);
        $this->call(desafiosTableSeeder::class);
        $this->call(createRespuestasSeeder::class);
        $this->call(likeSeeder::class);

    }
}
