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
        'name' => 'Esteban Mauricio',
        'email' => 'estebany@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('a1234'), // password
        'Apellidos' => 'Yanez Padilla',
        'Cedula' => '0503129413', 
        'Direccion' => 'Quito', 
        'Telefono' => '0989808394', 
        'Tipo' => 'administrador', 
        'Usuario' => '', 
        'Estado' => 1,
        ]);
        User::create([
            'name' => 'Gerardo Martin',
            'email' => 'gerardom@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('a1234'), // password
            'Apellidos' => 'Maca Cevallos',
            'Cedula' => '1721904868', 
            'Direccion' => 'Quito', 
            'Telefono' => '0936408394', 
            'Tipo' => 'administrador', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        //Técnicos
        User::create([
            'name' => 'Luis Nelson',
            'email' => 'luisc@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('t1234'), // password
            'Apellidos' => 'Cruz Chuquitarco',
            'Cedula' => '0502667603', 
            'Direccion' => 'Quito', 
            'Telefono' => '0987568394', 
            'Tipo' => 'tecnico', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        User::create([
            'name' => 'Luis Alfredo',
            'email' => 'luisf@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234lr'), // password
            'Apellidos' => 'Ferigra Anangono',
            'Cedula' => '1002553731', 
            'Direccion' => 'Quito', 
            'Telefono' => '0989763394', 
            'Tipo' => 'tecnico', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        User::create([
            'name' => 'Mario Eduardo',
            'email' => 'mariom@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('t1234'), // password
            'Apellidos' => 'Mena Jacome',
            'Cedula' => '0502116353', 
            'Direccion' => 'Quito', 
            'Telefono' => '0989776394', 
            'Tipo' => 'tecnico', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        User::create([
            'name' => 'Marco Aurelio',
            'email' => 'marcol@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('t1234'), // password
            'Apellidos' => 'Lagla Lagla',
            'Cedula' => '1717348534', 
            'Direccion' => 'Quito', 
            'Telefono' => '0989847564', 
            'Tipo' => 'tecnico', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        User::create([
            'name' => 'Alex Patricio',
            'email' => 'alexm@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('t1234'), // password
            'Apellidos' => 'Medrano Zambrano',
            'Cedula' => '0501875462', 
            'Direccion' => 'Latacunga', 
            'Telefono' => '0989438394', 
            'Tipo' => 'tecnico', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
        
            //Clientes
        User::create([
            'name' => 'Rosa Maria de Jesus',
            'Apellidos' => 'Almeida Naranjo',
            'Cedula' => '0500109897', 
            'Direccion' => 'Pichincha 37-46 y Roosvel', 
            'email' => 'rosaa@gmail.com',
            'Telefono' => '2813521', 
            'email_verified_at' => now(),
            'password' => bcrypt('c1234'), // 8
            'Tipo' => 'cliente', 
            'Usuario' => '', 
            'Estado' => 1,
            ]);
            User::create([
                'name' => 'Ramiro Leonardo',
                'Apellidos' => 'Razo Tapia',
                'Cedula' => '0500141726', 
                'Direccion' => 'Felix Valencia', 
                'email' => 'ramiror@gmail.com',
                'Telefono' => '2810543', 
                'email_verified_at' => now(),
                'password' => bcrypt('c1234'), // 9
                'Tipo' => 'cliente', 
                'Usuario' => '', 
                'Estado' => 1,
                ]);
                User::create([
                    'name' => 'Manuel Julio',
                    'Apellidos' => 'Otañez Salazar',
                    'Cedula' => '0101020782', 
                    'Direccion' => 'Alaquez 3-35 y Pumacunchi', 
                    'email' => 'manuelo@gmail.com',
                    'Telefono' => '0984023937', 
                    'email_verified_at' => now(),
                    'password' => bcrypt('c1234'), // 10
                    'Tipo' => 'cliente', 
                    'Usuario' => '', 
                    'Estado' => 1,
                    ]);
                    User::create([
                        'name' => 'Francisco Anibal',
                        'Apellidos' => 'Viteri Carrillo',
                        'Cedula' => '0500158241', 
                        'Direccion' => 'Juan Abel Echeverría 12-86 y Oriente', 
                        'Telefono' => '2811851', 
                        'email' => 'franciscov@gmail.com',
                        'email_verified_at' => now(),
                        'password' => bcrypt('c1234'), // 12
                        'Tipo' => 'cliente', 
                        'Usuario' => '', 
                        'Estado' => 1,
                        ]);
                        User::create([
                            'name' => 'Segundo Enrique',
                            'Apellidos' => 'Iza Hidalgo',
                            'Cedula' => '0500171830', 
                            'Direccion' => 'Ciudadela el Mag calle el copal y rafael cajiao', 
                            'Telefono' => '0987285481', 
                            'email' => 'segundoi@gmail.com',
                            'email_verified_at' => now(),
                            'password' => bcrypt('c1234'), // 13
                            'Tipo' => 'cliente', 
                            'Usuario' => '', 
                            'Estado' => 1,
                            ]);
                        User::create([
                            'name' => 'Luis Alberto',
                            'Apellidos' => 'Paucar Romero',
                            'Cedula' => '0300936713', 
                            'Direccion' => 'Saquisilí 2-65 y Tanicuchi', 
                            'Telefono' => '2803326', 
                            'email' => 'luisp@gmail.com',
                            'email_verified_at' => now(),
                            'password' => bcrypt('c1234'), // 13
                            'Tipo' => 'cliente', 
                            'Usuario' => '', 
                            'Estado' => 1,
                            ]);
           

          
    }
}
