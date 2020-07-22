<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Prioridades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prioridads')->insert([
            'nombrePrio' => 'Alta',
        ]);
        DB::table('prioridads')->insert([
            'nombrePrio' => 'Media',
        ]);
        DB::table('prioridads')->insert([
            'nombrePrio' => 'Baja',
        ]);
        DB::table('users')->insert([
            'email' => 'mast@gmail.com',
            'password' => bcrypt('123456'),
            'usuario' => 'Ronald',
            'activado'=> 1,
            'role_id'=>1,
            'nombres' => 'Ronald',
            'apellidos' => 'Miranda'
        ]);

        DB::table('users')->insert([
            'email' => 'mirandarodriguezronald@gmail.com',
            'password' => bcrypt('123456'),
            'usuario' => 'Rodrigo',
            'activado'=> 1,
            'nombres' => 'Rodrigo',
            'apellidos' => 'Cuellar'
        ]);
        DB::table('estados')->insert([
            'nombre_est' => 'Pendiente',
        ]);
        DB::table('estados')->insert([
            'nombre_est' => 'En curso',
        ]);
        DB::table('estados')->insert([
            'nombre_est' => 'Concluido',
        ]);
    }
}
