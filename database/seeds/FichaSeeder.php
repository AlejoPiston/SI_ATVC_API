<?php

use Illuminate\Database\Seeder;
use App\Ficha;

class FichaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ficha::create([
            'Nombres' => 'María Iralda',
            'Apellidos' => 'Rodríguez Castillo',   
            'CedulaRuc' => '1702806472',   
            'DireccionDomicilio' => 'Quito',   
            'TelefonoDomicilio' => '0983358394',   
            'DireccionCobro' => 'Quito',   
            'TelefonoCobro' => '0983358394',   
            'Referencia' => 'Calle centro',
            'Latitud' => '-0.8386899',
            'Longitud' => '-78.6664006',
            'CobroDomicilio' => 0,    
            'Archivada' => 1,
            'FechaInscripcion' => '2020/05/05',
            'Email' => 'mariar@gmail.com',
            'ValorInscripcion' => 50,
            'ValorMaterial' => 5,
            'ValorOtros' => 10,
            'ValorMensual' => 22,    
            'FechaCobro' => '2020/05/05',
            'Observacion' => '$faker->text($maxNbChars = 50)',
            'Estado' => 0,
            'TvAdicional' => 2,
            'Filtro' => 1,
            'MensualidadesPendientes' => 2,
            'Factura' => 1,    
            'Renegociar' => 0,
            'PagadoHasta' => '2020/05/05',
            'NumSerieEquipo' => 'Str::random(10)',
            'EquipoRetirado' => 1,
            'IdZona' => 1,
            'IdServicio' => 4,
            ]);
        Ficha::create([
            'Nombres' => 'Tatiana Anabel',
            'Apellidos' => 'Cumbal Vergara',   
            'CedulaRuc' => '1703804628',   
            'DireccionDomicilio' => 'Cuenca',   
            'TelefonoDomicilio' => '0989808394',   
            'DireccionCobro' => 'Cuenca',   
            'TelefonoCobro' => '0989808394',   
            'Referencia' => 'Calle centro',
            'Latitud' => '-0.9340311',
            'Longitud' => '-78.6145758',
            'CobroDomicilio' => 0,    
            'Archivada' => 1,
            'FechaInscripcion' => '2020/05/05',
            'Email' => 'tatianac@gmail.com',
            'ValorInscripcion' => 50,
            'ValorMaterial' => 5,
            'ValorOtros' => 10,
            'ValorMensual' => 29,    
            'FechaCobro' => '2020/05/05',
            'Observacion' => '$faker->text($maxNbChars = 50)',
            'Estado' => 1,
            'TvAdicional' => 2,
            'Filtro' => 1,
            'MensualidadesPendientes' => 2,
            'Factura' => 1,    
            'Renegociar' => 0,
            'PagadoHasta' => '2020/05/05',
            'NumSerieEquipo' => 'Str::random(10)',
            'EquipoRetirado' => 1,
            'IdZona' => 3,
            'IdServicio' => 3,
            'IdUsuario' => 9,
            ]);

           
    }
}
