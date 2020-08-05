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
            'Nombres' => 'Tatiana Cumbal',
            'Apellidos' => 'Cumbal Vergara',   
            'CedulaRuc' => '1703804628',   
            'DireccionDomicilio' => 'Cuenca',   
            'TelefonoDomicilio' => '0989808394',   
            'DireccionCobro' => 'Cuenca',   
            'TelefonoCobro' => '0989808394',   
            'Referencia' => 'Calle centro',
            'CobroDomicilio' => 0,    
            'Archivada' => 1,
            'FechaInscripcion' => '2020/05/05',
            'Email' => 'tatiana@gmail.com',
            'ValorInscripcion' => 50,
            'ValorMaterial' => 5,
            'ValorOtros' => 10,
            'ValorMensual' => 22,    
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
            'IdZona' => 1,
            'IdServicio' => 2,
            ]);
        factory(Ficha::class, 10)->create();    
    }
}
