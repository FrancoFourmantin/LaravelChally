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
            'password' => Hash::make('hola123.'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_nacimiento' => '1998-09-21',
            'sexo' => 'h',
            'apellido' => 'Fourmantin',
            'username' => 'Fraklins420',
            'avatar' => 'primera-imagen-hombre.png'
        ]);

        DB::table('usuarios')->insert([
            'nombre' => 'Emiliano',
            'email' => 'Emiliano@gmail.com',
            'password' => Hash::make('hola123.'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_nacimiento' => '1994-09-20',
            'sexo' => 'h',
            'apellido' => 'Gioia',
            'username' => 'EmilianoGioia',
            'avatar' => 'primera-imagen-hombre.png'

        ]);


        DB::table('usuarios')->insert([
            'nombre' => 'Matias',
            'email' => 'matias@gmail.com',
            'password' => Hash::make('hola123.'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_nacimiento' => '1990-09-21',
            'sexo' => 'h',
            'apellido' => 'Bruno',
            'username' => 'MatiasBruno',
            'avatar' => 'primera-imagen-hombre.png'

        ]);


        
        DB::table('usuarios')->insert([
            'nombre' => 'Juan Cruz',
            'email' => 'juan@gmail.com',
            'password' => Hash::make('hola123.'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_nacimiento' => '2000-09-21',
            'sexo' => 'm',
            'apellido' => 'Apellido',
            'username' => 'JuanCruz',
            'avatar' => 'primera-imagen-hombre.png'

        ]);
    }
}
