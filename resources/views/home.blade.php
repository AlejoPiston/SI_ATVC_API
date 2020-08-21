@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link active')
@section('nav-link OT', 'nav-link')
@section('nav-link Administradores', 'nav-link')
@section('nav-link Tecnicos', 'nav-link')
@section('nav-link Clientes', 'nav-link')
@section('nav-link MOT', 'nav-link')
@section('nav-link MD', 'nav-link')
@section('nav-link FOT', 'nav-link')
@section('nav-link TMA', 'nav-link')

@section('header')
<div class="container-fluid">
  <div class="header-body">
<div class="row align-items-center py-4">
  <div class="col-lg-8">
    <h6 class="h2 text-white d-inline-block mb-0">{{ Auth::user()->Tipo }}</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page"></li>
      </ol>
    </nav>
  </div>  
</div>
</div>
</div>
@endsection

@section('contenido')

    

<div class="row">

    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">INICIO</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                Bienvenido! Por favor selecciona una opción del menú lateral izquierdo. 
            </div>
        </div>
    </div>
        @if (auth()->user()->Tipo == 'administrador')
          <div class="col-xl-6">
            <div class="card bg-default">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-light text-uppercase ls-1 mb-1">Notificación general</h6>
                    <h5 class="h3 text-white mb-0">Enviar a todos los usuarios</h5>
                  </div>
                  
                </div>
              </div>
              <div class="card-body">
                @if (session('notificacion'))
                  <div class="alert alert-success" role="alert">
                  {{ session('notificacion') }}
                  </div> 
                @endif
              <form action="{{ url('/fcm/send') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label class="h5 text-light col-sm-4" for="title">Título</label>
                        <input 
                          class="form-comtrol col-sm-12 h4" value="{{ config('app.name') }}"
                          type="text" name="title" id="title" required>
                    </div>
                    <div class="form-group">
                      <label class="h5 text-light col-sm-4" for="body">Mensaje</label>
                      <textarea name="body" id="body" rows="2" class="form-comtrol col-sm-12 h4" required>

                      </textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Enviar notificación</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Total órdenes de trabajo</h6>
                    <h5 class="h3 mb-0">Según día de la semana</h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <!-- Chart -->
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas"></canvas>
                </div>
              </div>
            </div>
          </div>
        @endif
</div>


  

    
@endsection
