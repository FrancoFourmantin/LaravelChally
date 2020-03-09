<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class createRespuestasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('respuestas')->insert([
            'id_autor' => 1,
            'id_desafio' => 1,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi totam asperiores ex eligendi esse placeat ut inventore sequi architecto, alias autem optio ducimus amet, distinctio error consectetur iusto cumque! Tempora. </br></br>',
            'archivo' => 'respuesta-vapor-1.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('respuestas')->insert([
            'id_autor' => 2,
            'id_desafio' => 1,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi totam asperiores ex eligendi esse placeat ut inventore sequi architecto, alias autem optio ducimus amet, distinctio error consectetur iusto cumque! Tempora. </br></br>',
            'archivo' => 'respuesta-vapor-2.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('respuestas')->insert([
            'id_autor' => 3,
            'id_desafio' => 1,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi totam asperiores ex eligendi esse placeat ut inventore sequi architecto, alias autem optio ducimus amet, distinctio error consectetur iusto cumque! Tempora. </br></br>',
            'archivo' => 'respuesta-vapor-3.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('respuestas')->insert([
            'id_autor' => 4,
            'id_desafio' => 1,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi totam asperiores ex eligendi esse placeat ut inventore sequi architecto, alias autem optio ducimus amet, distinctio error consectetur iusto cumque! Tempora. </br></br>',
            'archivo' => 'respuesta-vapor-4.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);



        DB::table('respuestas')->insert([
            'id_autor' => 1,
            'id_desafio' => 2,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi totam asperiores ex eligendi esse placeat ut inventore sequi architecto, alias autem optio ducimus amet, distinctio error consectetur iusto cumque! Tempora. </br></br>',
            'archivo' => 'respuesta-joker-1.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('respuestas')->insert([
            'id_autor' => 2,
            'id_desafio' => 2,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi totam asperiores ex eligendi esse placeat ut inventore sequi architecto, alias autem optio ducimus amet, distinctio error consectetur iusto cumque! Tempora. </br></br>',
            'archivo' => 'respuesta-joker-2.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('respuestas')->insert([
            'id_autor' => 3,
            'id_desafio' => 2,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi totam asperiores ex eligendi esse placeat ut inventore sequi architecto, alias autem optio ducimus amet, distinctio error consectetur iusto cumque! Tempora. </br></br>',
            'archivo' => 'respuesta-joker-3.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('respuestas')->insert([
            'id_autor' => 4,
            'id_desafio' => 2,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi totam asperiores ex eligendi esse placeat ut inventore sequi architecto, alias autem optio ducimus amet, distinctio error consectetur iusto cumque! Tempora. </br></br>',
            'archivo' => 'respuesta-joker-4.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


 




    }
}
