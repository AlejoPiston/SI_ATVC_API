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
        //Administradores
        User::create([
        'name' => 'Daniel Alejandro',
        'email' => 'danielo@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('1234do'), // password
        'Apellidos' => 'Oñate Castillo',
        'Cedula' => '0503804628', 
        'Direccion' => 'Quito', 
        'Telefono' => '0989808394', 
        'Tipo' => 'administrador', 
        'Usuario' => '', 
        'Estado' => 1,
        ]);
        //Técnicos
        User::create([
            'name' => 'Nelson Jair',
            'email' => 'nelsonj@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234nj'), // password
            'Apellidos' => 'Jacome Trávez',
            'Cedula' => '1703444648', 
            'Direccion' => 'Quito', 
            'Telefono' => '0989808394', 
            'Tipo' => 'tecnico', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        User::create([
            'name' => 'Leiser Andres',
            'email' => 'leiserr@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234lr'), // password
            'Apellidos' => 'Rodriguez Castillo',
            'Cedula' => '0503804648', 
            'Direccion' => 'Quito', 
            'Telefono' => '0989808394', 
            'Tipo' => 'tecnico', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        User::create([
            'name' => 'Jairo Stalin',
            'email' => 'jairos@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234jn'), // password
            'Apellidos' => 'Navarrete Rodriguez',
            'Cedula' => '1703804628', 
            'Direccion' => 'Quito', 
            'Telefono' => '0989808394', 
            'Tipo' => 'tecnico', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        User::create([
            'name' => 'Anthony Alexander',
            'email' => 'anthonyc@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234ac'), // password
            'Apellidos' => 'Cumbal Rodriguez',
            'Cedula' => '0503804628', 
            'Direccion' => 'Quito', 
            'Telefono' => '0989808394', 
            'Tipo' => 'tecnico', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        User::create([
            'name' => 'Jimmy Alexander',
            'email' => 'jimmyl@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234jl'), // password
            'Apellidos' => 'León Albán',
            'Cedula' => '1703804628', 
            'Direccion' => 'Latacunga', 
            'Telefono' => '0989808394', 
            'Tipo' => 'tecnico', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        //Clientes
        User::create([
            'name' => 'Juan Fernando',
            'email' => 'juanf@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234jf'), // password
            'Apellidos' => 'Flores Nina',
            'Cedula' => '1706784628', 
            'Direccion' => 'Cuenca', 
            'Telefono' => '0989808394', 
            'Tipo' => 'cliente', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        User::create([
            'name' => 'Marco Alcibar',
            'email' => 'marcoh@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234mh'), // password
            'Apellidos' => 'Hurtado Guerrero',
            'Cedula' => '1703877628', 
            'Direccion' => 'Cuenca', 
            'Telefono' => '0989808394', 
            'Tipo' => 'cliente', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        User::create([
            'name' => 'Tatiana Anabel',
            'email' => 'tatianac@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234tc'), // password
            'Apellidos' => 'Cumbal Vergara',
            'Cedula' => '1703804628', 
            'Direccion' => 'Cuenca', 
            'Telefono' => '0989808394', 
            'Tipo' => 'cliente', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);

          
    }
}
