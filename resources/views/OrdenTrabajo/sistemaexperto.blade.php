@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link active')
@section('nav-link Administradores', 'nav-link')
@section('nav-link Tecnicos', 'nav-link')
@section('nav-link Clientes', 'nav-link')
@section('nav-link MOT', 'nav-link')
@section('nav-link Ubi', 'nav-link')
@section('nav-link MD', 'nav-link')
@section('nav-link FOT', 'nav-link')
@section('nav-link TMA', 'nav-link')

@section('styles')

@endsection

@section('contenido')

<div class="header pb-4 d-flex align-items-center">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-9 col-md-0">
        <h1 class="display-2 text-white">Sistema Experto</h1>
        <p class="text-white mt-0 mb-2">Este sistema experto está desarrollado para usar Prolog desde PHP</p>
        
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Seleccionar técnico</h3>
      </div>
      <div class="col text-right">
      <a href="{{ url('/orden_trabajos/create') }}" class="btn btn-sm btn-default">
            Cancelar y volver
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
  <?php
      $defaultMain = 'persona(maria).' . PHP_EOL
          . 'persona(pepe).' . PHP_EOL
          . PHP_EOL
          . 'edad(pepe, 22).' . PHP_EOL
          . 'edad(maria, 23).' . PHP_EOL
          . PHP_EOL
          . "escribeEdades([]) :- write('No hay mas información sobre edades.'), nl." . PHP_EOL
          . 'escribeEdades([Primera|Personas]) :-' . PHP_EOL
          . " edad(Primera, X), write(Primera), write(' tiene de edad '), write(X), nl, escribeEdades(Personas)." . PHP_EOL
          . '' . PHP_EOL
          . 'main :-' . PHP_EOL
          . " write('¡Hola Mundo!'), nl," . PHP_EOL
          . ' findall(X, persona(X), Personas),' . PHP_EOL
          . ' escribeEdades(Personas).' . PHP_EOL;

      // If intializing..
      if (!file_exists('index.pl')) {
          file_put_contents('index.pl', $defaultMain);
      }

      // If updating..
      if (isset($_POST['program'])) {
          file_put_contents('index.pl', $_POST['program']);
      }

      if (isset($_POST['query'])) {
          // If executing query..
          $query = $_POST['query'];
      } else {
          // If executing main..
          $query = "main.";
      }
      $lastLine = exec('swipl -s index.pl -g "' . $query . '" -t halt.', $output, $returnValue);

      ?>

      <h2>Resultado de consultar ?- <?= $query ?></h2>
      <div style="border: 1px dashed black; width: 90%; padding-left: 12px; padding-right: 12px;">
          <pre><?php
                  foreach ($output as $line) {
                      echo $line . '<br>';
                  }
                  ?></pre>
          <?php //var_dump($output) 
          ?>
          <p>Valor de retorno: <?= $returnValue ?> <?php
                                                      if ($returnValue == 0) echo 'true';
                                                      elseif ($returnValue == 1) echo 'false';
                                                      elseif ($returnValue == 2) echo 'error';
                                                      ?> - Última línea: <?= $lastLine ?></p>
      </div>

      <h2>Hacer consulta simple</h2>
      <form method="post">
        @csrf
          ?- <input type="text" style="width: 75%;" name="query">
          <input type="submit" value="Consultar"><br>
          <small>Por ejemplo:<br>
              ¿Pepe es una persona? <strong>persona(pepe).</strong><br>
              ¿Cuál es la edad de pepe? <strong>edad(pepe, X), write(X).</strong><br>
              ¿Cuáles son todas las personas? <strong>findall(X, persona(X), Personas), write(Personas).</strong></small>
      </form>

      <h2>Programa completo</h2>
      <form method="post">
        @csrf
          <textarea style="min-height: 200px; width: 100%;" name="program"><?= file_get_contents('index.pl'); ?></textarea>
          <input type="submit" value="Actualizar">
      </form>
    
  </div>
  
</div>     

@endsection
@section('scripts')

@endsection




