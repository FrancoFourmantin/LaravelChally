<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;  

class likeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('likes')->insert([
            'id_desafio' => 1,
            'id_usuario' => 1,
            'id_respuesta' => null,
            'like_or_dislike' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('likes')->insert([
            'id_desafio' => 1,
            'id_usuario' => 2,
            'id_respuesta' => null,
            'like_or_dislike' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('likes')->insert([
            'id_desafio' => 1,
            'id_usuario' => 3,
            'id_respuesta' => null,
            'like_or_dislike' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('likes')->insert([
            'id_desafio' => 2,
            'id_usuario' => 3,
            'id_respuesta' => null,
            'like_or_dislike' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('likes')->insert([
            'id_desafio' => null,
            'id_usuario' => 1,
            'id_respuesta' => 1,
            'like_or_dislike' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('likes')->insert([
            'id_desafio' => null,
            'id_usuario' => 2,
            'id_respuesta' => 1,
            'like_or_dislike' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('likes')->insert([
            'id_desafio' => null,
            'id_usuario' => 3,
            'id_respuesta' => 1,
            'like_or_dislike' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
