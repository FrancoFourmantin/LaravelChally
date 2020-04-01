<?php

use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CreacionDeUsuariosDePrueba extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Franco',
            'email' => 'franco@gmail.com',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_nacimiento' => '1998-09-21',
            'sexo' => 'h',
            'apellido' => 'Fourmantin',
            'username' => 'Fraklins420',
            'avatar' => 'foto-franco.jpg',
            'cover' => 'cover.jpg',
            'bio' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit consectetur corporis, laudantium debitis ex suscipit expedita officia provident distinctio asperiores. Quidem nesciunt doloribus sed omnis itaque atque, ducimus beatae iste!',
            'role' => 'admin'
            
        ]);

        DB::table('usuarios')->insert([
            'nombre' => 'Emiliano',
            'email' => 'Emiliano@gmail.com',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_nacimiento' => '1994-11-24',
            'sexo' => 'h',
            'apellido' => 'Gioia',
            'username' => 'Emilianog94',
            'avatar' => 'foto-emi.jpg',
            'cover' => 'cover.jpg',
            'bio' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit consectetur corporis, laudantium debitis ex suscipit expedita officia provident distinctio asperiores. Quidem nesciunt doloribus sed omnis itaque atque, ducimus beatae iste!',
            'link_linkedin' => 'https://www.linkedin.com/in/emilianogioia/',
            'link_behance' => 'https://www.behance.net/emilianogioia',
            'link_website' => 'https://emilianogioia.com.ar',
            'link_github' => 'https://github.com/emilianog94',

        ]);


        DB::table('usuarios')->insert([
            'nombre' => 'Matias',
            'email' => 'matias@gmail.com',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_nacimiento' => '1990-09-21',
            'sexo' => 'h',
            'apellido' => 'Bruno',
            'username' => 'MatiasBruno',
            'avatar' => 'foto-matias.jpg',
            'cover' => 'cover.jpg',
            'bio' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit consectetur corporis, laudantium debitis ex suscipit expedita officia provident distinctio asperiores. Quidem nesciunt doloribus sed omnis itaque atque, ducimus beatae iste!',
        ]);


        
        DB::table('usuarios')->insert([
            'nombre' => 'Juan Cruz',
            'email' => 'juan@gmail.com',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_nacimiento' => '2000-09-21',
            'sexo' => 'm',
            'apellido' => 'Andrada',
            'username' => 'JuanCruz',
            'avatar' => 'foto-matias.jpg',
            'cover' => 'cover.jpg',
            'bio' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit consectetur corporis, laudantium debitis ex suscipit expedita officia provident distinctio asperiores. Quidem nesciunt doloribus sed omnis itaque atque, ducimus beatae iste!',
        ]);
    }
}
