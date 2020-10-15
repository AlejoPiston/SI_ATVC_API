@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link active')
@section('nav-link IN', 'nav-link')
@section('nav-link Administradores', 'nav-link')
@section('nav-link Tecnicos', 'nav-link')
@section('nav-link Clientes', 'nav-link')
@section('nav-link MOT', 'nav-link active')
@section('nav-link Ubi', 'nav-link')
@section('nav-link MD', 'nav-link active')
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
        <li class="breadcrumb-item"><a href="{{ url('/orden_trabajos') }}">Órdenes de trabajo</a></li>
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
          <h3 class="mb-0">Órdenes de Trabajo</h3>
        </div>
        @if ($Tipo == 'administrador' || $Tipo == 'cliente')
          <div class="col text-right">
            <a href="{{ url('/orden_trabajos/create') }}" class="btn btn-success" data-toggle="tooltip" 
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
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/confirmadas')) ? 'active' : '' }}" 
            href="{{ url('/orden_trabajos/confirmadas') }}" role="tab" 
            aria-selected="{{ (request()->is('orden_trabajos/confirmadas')) ? 'true' : '' }}">
            <i class="ni ni-check-bold mr-2"></i>Confirmadas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/pendientes')) ? 'active' : '' }}" 
          href="{{ url('/orden_trabajos/pendientes') }}" role="tab" 
          aria-selected="{{ (request()->is('orden_trabajos/pendientes')) ? 'true' : '' }}">
            <i class="ni ni-ui-04 mr-2"></i>Por confirmar
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/encamino')) ? 'active' : '' }}" 
          href="{{ url('/orden_trabajos/encamino') }}" role="tab" 
          aria-selected="{{ (request()->is('orden_trabajos/encamino')) ? 'true' : '' }}">
            <i class="ni ni-bus-front-12 mr-2"></i>En camino
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/enprogreso')) ? 'active' : '' }}" 
          href="{{ url('/orden_trabajos/enprogreso') }}" role="tab" 
          aria-selected="{{ (request()->is('orden_trabajos/enprogreso')) ? 'true' : '' }}">
            <i class="ni ni-compass-04 mr-2"></i>En progreso
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/historial')) ? 'active' : '' }}" 
          href="{{ url('/orden_trabajos/historial') }}" role="tab" 
          aria-selected="{{ (request()->is('orden_trabajos/historial')) ? 'true' : '' }}">
            <i class="ni ni-book-bookmark mr-2"></i>Historial
          </a>
        </li>
        @elseif(auth()->user()->Tipo == 'tecnico')
        

        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/confirmadas')) ? 'active' : '' }}" 
            href="{{ url('/orden_trabajos/confirmadas') }}" role="tab" 
            aria-selected="{{ (request()->is('orden_trabajos/confirmadas')) ? 'true' : '' }}">
            <i class="ni ni-check-bold mr-2"></i>Confirmadas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/encamino')) ? 'active' : '' }}" 
            href="{{ url('/orden_trabajos/encamino') }}" role="tab" 
            aria-selected="{{ (request()->is('orden_trabajos/encamino')) ? 'true' : '' }}">
            <i class="ni ni-bus-front-12 mr-2"></i>En camino
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/enprogreso')) ? 'active' : '' }}" 
          href="{{ url('/orden_trabajos/enprogreso') }}" role="tab" 
          aria-selected="{{ (request()->is('orden_trabajos/enprogreso')) ? 'true' : '' }}">
            <i class="ni ni-compass-04 mr-2"></i>En progreso
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/historial')) ? 'active' : '' }}" 
          href="{{ url('/orden_trabajos/historial') }}" role="tab" 
          aria-selected="{{ (request()->is('orden_trabajos/historial')) ? 'true' : '' }}">
            <i class="ni ni-book-bookmark mr-2"></i>Historial
          </a>
        </li>
        @else {{-- Cliente --}}

        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/confirmadas')) ? 'active' : '' }}" 
            href="{{ url('/orden_trabajos/confirmadas') }}" role="tab" 
            aria-selected="{{ (request()->is('orden_trabajos/confirmadas')) ? 'true' : '' }}">
            <i class="ni ni-check-bold mr-2"></i>Confirmadas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/pendientes')) ? 'active' : '' }}" 
          href="{{ url('/orden_trabajos/pendientes') }}" role="tab" 
          aria-selected="{{ (request()->is('orden_trabajos/pendientes')) ? 'true' : '' }}">
            <i class="ni ni-ui-04 mr-2"></i>Por confirmar
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/encamino')) ? 'active' : '' }}" 
            href="{{ url('/orden_trabajos/encamino') }}" role="tab" 
            aria-selected="{{ (request()->is('orden_trabajos/encamino')) ? 'true' : '' }}">
            <i class="ni ni-bus-front-12 mr-2"></i>En camino
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/enprogreso')) ? 'active' : '' }}" 
          href="{{ url('/orden_trabajos/enprogreso') }}" role="tab" 
          aria-selected="{{ (request()->is('orden_trabajos/enprogreso')) ? 'true' : '' }}">
            <i class="ni ni-compass-04 mr-2"></i>En progreso
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 {{ (request()->is('orden_trabajos/historial')) ? 'active' : '' }}" 
          href="{{ url('/orden_trabajos/historial') }}" role="tab" 
          aria-selected="{{ (request()->is('orden_trabajos/historial')) ? 'true' : '' }}">
            <i class="ni ni-book-bookmark mr-2"></i>Historial
          </a>
        </li>
        @endif
        
      </ul>    
    </div>
    
    <div class="tab-content" id="pills-tabContent">
      @if (auth()->user()->Tipo == 'administrador')
      
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/confirmadas')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/confirmadas')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/confirmadas') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.confirmadas')
      </div>
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/pendientes')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/pendientes')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/pendientes') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.pendientes')
        
      </div>
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/encamino')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/encamino')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/encamino') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.encamino')
      </div>
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/enprogreso')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/enprogreso')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/enprogreso') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.enprogreso')
          
      </div>
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/historial')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/historial')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/historial') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.historial')
      </div>
      
      @elseif(auth()->user()->Tipo == 'tecnico')
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/confirmadas')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/confirmadas')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/confirmadas') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.confirmadas')
      </div>
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/encamino')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/encamino')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/encamino') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.encamino')
      </div>
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/enprogreso')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/enprogreso')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/enprogreso') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.enprogreso')
          
      </div>
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/historial')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/historial')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/historial') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.historial')
      </div>
      @else {{-- Cliente --}}
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/confirmadas')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/confirmadas')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/confirmadas') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.confirmadas')
      </div>
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/pendientes')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/pendientes')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/pendientes') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.pendientes')
        
      </div>
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/encamino')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/encamino')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/encamino') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.encamino')
      </div>
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/enprogreso')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/enprogreso')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/enprogreso') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.enprogreso')
          
      </div>
      <div class="tab-pane fade {{ (request()->is('orden_trabajos/historial')) ? 'show' : '' }} 
        {{ (request()->is('orden_trabajos/historial')) ? 'active' : '' }}" 
        id="{{ url('/orden_trabajos/historial') }}" role="tabpanel">
        @include('OrdenTrabajo.tablas.historial')
      </div>
      @endif
      
    </div>
  </div> 
  
 
@endsection




