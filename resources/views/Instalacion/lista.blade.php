@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link')
@section('nav-link IN', 'nav-link active')
@section('nav-link Administradores', 'nav-link')
@section('nav-link Tecnicos', 'nav-link')
@section('nav-link Clientes', 'nav-link')
@section('nav-link MOT', 'nav-link')
@section('nav-link Ubi', 'nav-link')
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
        <li class="breadcrumb-item active" aria-current="page">Gestionar</li>
        <li class="breadcrumb-item"><a href="{{ url('/instalaciones') }}">Instalaciones</a></li>
      </ol>
    </nav>
  </div>  
</div>
</div>
</div>
@endsection

@section('contenido')

<div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Instalaciones</h3>
        </div>
        @if ($Tipo == 'administrador' || $Tipo == 'cliente')
          <div class="col text-right">
            <a href="{{ url('/instalaciones/create') }}" class="btn btn-success" data-toggle="tooltip" 
            data-placement="top" 
            title="Registrar nueva orden de trabajo">
            <span class="btn-inner--icon"><i class="ni ni-delivery-fast"></i></span>
            <span class="btn-inner--text">Nueva</span>
          </a>
          </div>
        @endif
        
      </div>
    </div>
    <div class="card-body">
      @if (session('notificacion'))
      <div class="alert alert-success" role="alert">
        {{ session('notificacion') }}
      </div> 
      @endif
      
      <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="pills-tab" role="tablist">

        @if (auth()->user()->Tipo == 'administrador')
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/confirmadas')) ? 'active' : '' }}" 
            href="{{ url('/instalaciones/confirmadas') }}" role="tab" 
            aria-selected="{{ (request()->is('instalaciones/confirmadas')) ? 'true' : '' }}">
            <i class="ni ni-check-bold mr-2"></i>Confirmadas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/pendientes')) ? 'active' : '' }}" 
          href="{{ url('/instalaciones/pendientes') }}" role="tab" 
          aria-selected="{{ (request()->is('instalaciones/pendientes')) ? 'true' : '' }}">
            <i class="ni ni-ui-04 mr-2"></i>Por confirmar
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/encamino')) ? 'active' : '' }}" 
          href="{{ url('/instalaciones/encamino') }}" role="tab" 
          aria-selected="{{ (request()->is('instalaciones/encamino')) ? 'true' : '' }}">
            <i class="ni ni-bus-front-12 mr-2"></i>En camino
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/enprogreso')) ? 'active' : '' }}" 
          href="{{ url('/instalaciones/enprogreso') }}" role="tab" 
          aria-selected="{{ (request()->is('instalaciones/enprogreso')) ? 'true' : '' }}">
            <i class="ni ni-compass-04 mr-2"></i>En progreso
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/historial')) ? 'active' : '' }}" 
          href="{{ url('/instalaciones/historial') }}" role="tab" 
          aria-selected="{{ (request()->is('instalaciones/historial')) ? 'true' : '' }}">
            <i class="ni ni-book-bookmark mr-2"></i>Historial
          </a>
        </li>
        @elseif(auth()->user()->Tipo == 'tecnico')
        

        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/confirmadas')) ? 'active' : '' }}" 
            href="{{ url('/instalaciones/confirmadas') }}" role="tab" 
            aria-selected="{{ (request()->is('instalaciones/confirmadas')) ? 'true' : '' }}">
            <i class="ni ni-check-bold mr-2"></i>Confirmadas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/encamino')) ? 'active' : '' }}" 
            href="{{ url('/instalaciones/encamino') }}" role="tab" 
            aria-selected="{{ (request()->is('instalaciones/encamino')) ? 'true' : '' }}">
            <i class="ni ni-bus-front-12 mr-2"></i>En camino
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/enprogreso')) ? 'active' : '' }}" 
          href="{{ url('/instalaciones/enprogreso') }}" role="tab" 
          aria-selected="{{ (request()->is('instalaciones/enprogreso')) ? 'true' : '' }}">
            <i class="ni ni-compass-04 mr-2"></i>En progreso
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/historial')) ? 'active' : '' }}" 
          href="{{ url('/instalaciones/historial') }}" role="tab" 
          aria-selected="{{ (request()->is('instalaciones/historial')) ? 'true' : '' }}">
            <i class="ni ni-book-bookmark mr-2"></i>Historial
          </a>
        </li>
        @else {{-- Cliente --}}

        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/confirmadas')) ? 'active' : '' }}" 
            href="{{ url('/instalaciones/confirmadas') }}" role="tab" 
            aria-selected="{{ (request()->is('instalaciones/confirmadas')) ? 'true' : '' }}">
            <i class="ni ni-check-bold mr-2"></i>Confirmadas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/pendientes')) ? 'active' : '' }}" 
          href="{{ url('/instalaciones/pendientes') }}" role="tab" 
          aria-selected="{{ (request()->is('instalaciones/pendientes')) ? 'true' : '' }}">
            <i class="ni ni-ui-04 mr-2"></i>Por confirmar
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/encamino')) ? 'active' : '' }}" 
            href="{{ url('/instalaciones/encamino') }}" role="tab" 
            aria-selected="{{ (request()->is('instalaciones/encamino')) ? 'true' : '' }}">
            <i class="ni ni-bus-front-12 mr-2"></i>En camino
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/enprogreso')) ? 'active' : '' }}" 
          href="{{ url('/instalaciones/enprogreso') }}" role="tab" 
          aria-selected="{{ (request()->is('instalaciones/enprogreso')) ? 'true' : '' }}">
            <i class="ni ni-compass-04 mr-2"></i>En progreso
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('instalaciones/historial')) ? 'active' : '' }}" 
          href="{{ url('/instalaciones/historial') }}" role="tab" 
          aria-selected="{{ (request()->is('instalaciones/historial')) ? 'true' : '' }}">
            <i class="ni ni-book-bookmark mr-2"></i>Historial
          </a>
        </li>
        @endif
        
      </ul>    
    </div>
    
    <div class="tab-content" id="pills-tabContent">
      @if (auth()->user()->Tipo == 'administrador')
      
      <div class="tab-pane fade {{ (request()->is('instalaciones/confirmadas')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/confirmadas')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/confirmadas') }}" role="tabpanel">
        @include('Instalacion.tablas.confirmadas')
      </div>
      <div class="tab-pane fade {{ (request()->is('instalaciones/pendientes')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/pendientes')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/pendientes') }}" role="tabpanel">
        @include('Instalacion.tablas.pendientes')
        
      </div>
      <div class="tab-pane fade {{ (request()->is('instalaciones/encamino')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/encamino')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/encamino') }}" role="tabpanel">
        @include('Instalacion.tablas.encamino')
      </div>
      <div class="tab-pane fade {{ (request()->is('instalaciones/enprogreso')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/enprogreso')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/enprogreso') }}" role="tabpanel">
        @include('Instalacion.tablas.enprogreso')
          
      </div>
      <div class="tab-pane fade {{ (request()->is('instalaciones/historial')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/historial')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/historial') }}" role="tabpanel">
        @include('Instalacion.tablas.historial')
      </div>
      
      @elseif(auth()->user()->Tipo == 'tecnico')
      <div class="tab-pane fade {{ (request()->is('instalaciones/confirmadas')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/confirmadas')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/confirmadas') }}" role="tabpanel">
        @include('Instalacion.tablas.confirmadas')
      </div>
      <div class="tab-pane fade {{ (request()->is('instalaciones/encamino')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/encamino')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/encamino') }}" role="tabpanel">
        @include('Instalacion.tablas.encamino')
      </div>
      <div class="tab-pane fade {{ (request()->is('instalaciones/enprogreso')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/enprogreso')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/enprogreso') }}" role="tabpanel">
        @include('Instalacion.tablas.enprogreso')
          
      </div>
      <div class="tab-pane fade {{ (request()->is('instalaciones/historial')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/historial')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/historial') }}" role="tabpanel">
        @include('Instalacion.tablas.historial')
      </div>
      @else {{-- Cliente --}}
      <div class="tab-pane fade {{ (request()->is('instalaciones/confirmadas')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/confirmadas')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/confirmadas') }}" role="tabpanel">
        @include('Instalacion.tablas.confirmadas')
      </div>
      <div class="tab-pane fade {{ (request()->is('instalaciones/pendientes')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/pendientes')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/pendientes') }}" role="tabpanel">
        @include('Instalacion.tablas.pendientes')
        
      </div>
      <div class="tab-pane fade {{ (request()->is('instalaciones/encamino')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/encamino')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/encamino') }}" role="tabpanel">
        @include('Instalacion.tablas.encamino')
      </div>
      <div class="tab-pane fade {{ (request()->is('instalaciones/enprogreso')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/enprogreso')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/enprogreso') }}" role="tabpanel">
        @include('Instalacion.tablas.enprogreso')
          
      </div>
      <div class="tab-pane fade {{ (request()->is('instalaciones/historial')) ? 'show' : '' }} 
        {{ (request()->is('instalaciones/historial')) ? 'active' : '' }}" 
        id="{{ url('/instalaciones/historial') }}" role="tabpanel">
        @include('Instalacion.tablas.historial')
      </div>
      @endif
      
    </div>
  </div> 
  
 
@endsection




