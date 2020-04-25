<?php

use Illuminate\Database\Seeder;
use App\Usuario;
use App\Desafio;
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
        $this->call(interesesSeeder::class);
        factory(Usuario::class)->times(30)->create();
        // factory(Desafio::class)->times(30)->create();
    }
}
