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
        'Estado' => 1,
        ]);

        factory(User::class, 10)->create();    
    }
}
