<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' 				=>	'administrador general',
            'email'				=>	'administrador@gmail.com',
                'password'			=>	Hash::make('administrador@gmail.com'),
            'rol'               => '1',
            'verificado'        => '1'
        ]);

        DB::table('users')->insert([
            'name' 				=>	'usuario general',
            'email'				=>	'usuario@gmail.com',
            'password'			=>	Hash::make('usuario@gmail.com'),
            'rol'               => '2',
            'verificado'        => '1'
        ]);

        DB::table('users')->insert([
            'name' 				=>	'usuario normal',
            'email'				=>	'user@gmail.com',
            'password'			=>	Hash::make('user@gmail.com'),
            'rol'               => '3',
            'verificado'        => '1'
        ]);
    }
}
