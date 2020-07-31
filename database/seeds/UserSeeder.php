<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'name' => 'Daniel Alejandro',
        'email' => 'daoc1094@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('12345678'), // password
        'Apellidos' => 'Oñate Castillo',
        'Cedula' => '0503804628', 
        'Direccion' => '', 
        'Telefono' => '', 
        'Tipo' => 'administrador', 
        'Usuario' => '', 
        'Estado' => 1,
        ]);
        User::create([
            'name' => 'Jimmy Alexander',
            'email' => 'alexander@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234567'), // password
            'Apellidos' => 'León Albán',
            'Cedula' => '1703804628', 
            'Direccion' => '', 
            'Telefono' => '', 
            'Tipo' => 'tecnico', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        User::create([
            'name' => 'Tatiana Cumbal',
            'email' => 'tatiana@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'), // password
            'Apellidos' => 'León',
            'Cedula' => '1703804628', 
            'Direccion' => '', 
            'Telefono' => '', 
            'Tipo' => 'cliente', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);

        factory(User::class, 10)->create();    
    }
}
