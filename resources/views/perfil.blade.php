@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link')
@section('nav-link IN', 'nav-link')
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
        <h1 class="display-2 text-white">Mi perfil</h1>
        <p class="text-white mt-0 mb-5">Esta es tu página de perfil. Puede ver y administrar sus datos de usuario</p>
        <a href="{{ url('/perfil/'.Auth::user()->id.'/edit') }}" class="btn btn-neutral">Editar perfil</a>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Mis datos personales</h3>
      </div>
      <div class="col text-right">
      <a href="{{ route('home') }}" class="btn btn-sm btn-default">
            Ir a inicio
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
      @if (session('notificacion'))
      <div class="alert alert-success" role="alert">
        {{ session('notificacion') }}
      </div> 
      @endif
    <div class="row">
      <div class="col-xl-6 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Nombre:</h5>
                <span class="h3 font-weight-bold mb-0">{{ $user->name }} {{ $user->Apellidos }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                  <i class="ni ni-credit-card"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
              <span class="text-success mr-2">Cédula:</span>
              <span class="text-nowrap">{{ $user->Cedula }}</span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Email:</h5>
                  <span class="h3 font-weight-bold mb-0">{{ $user->email }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-email-83"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2">Fecha de registro:</span>
                <span class="text-nowrap">{{ $user->created_at }}</span>
              </p>
            </div>
          </div>
        </div>
      <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Tipo:</h5>
                  <span class="h3 font-weight-bold mb-0">{{ $user->Tipo }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="ni ni-money-coins"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2">Estado:</span>
                @if ($user->Estado == '1')
                <span class="text-nowrap">Activo</span>
              @elseif($user->Estado == '0')
                <span class="text-nowrap">Inactivo</span>
              @endif
              </p>
            </div>
          </div>
        </div>
      <div class="col-xl-8 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Dirección:</h5>
                <span class="h3 font-weight-bold mb-0">{{ $user->Direccion }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                  <i class="ni ni-pin-3"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
              <span class="text-success mr-2">Teléfono:</span>
              <span class="text-nowrap">{{ $user->Telefono }}</span>
            </p>
          </div>
        </div>
      </div>
      
    </div>  
  </div>
  
</div>     

@endsection
@section('scripts')

@endsection




