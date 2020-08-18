@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link active')
@section('nav-link Administradores', 'nav-link')
@section('nav-link Tecnicos', 'nav-link')
@section('nav-link Clientes', 'nav-link')
@section('nav-link MOT', 'nav-link')
@section('nav-link MD', 'nav-link')
@section('nav-link FOT', 'nav-link')
@section('nav-link TMA', 'nav-link')

@section('contenido')

<div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Órdenes de Trabajo</h3>
        </div>
        @if ($Tipo == 'administrador' || $Tipo == 'cliente')
          <div class="col text-right">
          <a href="{{ url('/orden_trabajos/create') }}" class="btn btn-sm btn-success">
                Nueva orden de trabajo
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
          <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="pill" href="#confirmadas-ordenes" role="tab" aria-selected="true">
            <i class="ni ni-check-bold mr-2"></i>Órdenes confirmadas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0" data-toggle="pill" href="#pendientes-ordenes" role="tab" aria-selected="false">
            <i class="ni ni-ui-04 mr-2"></i>Órdenes por confirmar
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0" data-toggle="pill" href="#enprogreso-ordenes" role="tab" aria-selected="false">
            <i class="ni ni-compass-04 mr-2"></i>Órdenes en progreso
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0" data-toggle="pill" href="#historial-ordenes" role="tab" aria-selected="false">
            <i class="ni ni-book-bookmark mr-2"></i>Historial
          </a>
        </li>
        @elseif(auth()->user()->Tipo == 'tecnico')
        
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="pill" href="#confirmadas-ordenes" role="tab" aria-selected="true">
            <i class="ni ni-check-bold mr-2"></i>Órdenes confirmadas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0" data-toggle="pill" href="#enprogreso-ordenes" role="tab" aria-selected="false">
            <i class="ni ni-compass-04 mr-2"></i>Órdenes en progreso
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0" data-toggle="pill" href="#historial-ordenes" role="tab" aria-selected="false">
            <i class="ni ni-book-bookmark mr-2"></i>Historial
          </a>
        </li>
        @else {{-- Cliente --}}

        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="pill" href="#confirmadas-ordenes" role="tab" aria-selected="true">
            <i class="ni ni-check-bold mr-2"></i>Órdenes confirmadas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0" data-toggle="pill" href="#pendientes-ordenes" role="tab" aria-selected="false">
            <i class="ni ni-ui-04 mr-2"></i>Órdenes por confirmar
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0" data-toggle="pill" href="#enprogreso-ordenes" role="tab" aria-selected="false">
            <i class="ni ni-compass-04 mr-2"></i>Órdenes en progreso
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0" data-toggle="pill" href="#historial-ordenes" role="tab" aria-selected="false">
            <i class="ni ni-book-bookmark mr-2"></i>Historial
          </a>
        </li>
        @endif
        
      </ul>    
    </div>
    
    <div class="tab-content" id="pills-tabContent">
      @if (auth()->user()->Tipo == 'administrador')
      <div class="tab-pane fade show active" id="confirmadas-ordenes" role="tabpanel">
        @include('OrdenTrabajo.tablas.confirmadas')
      </div>
      <div class="tab-pane fade" id="pendientes-ordenes" role="tabpanel">
        @include('OrdenTrabajo.tablas.pendientes')
        
      </div>
      <div class="tab-pane fade" id="enprogreso-ordenes" role="tabpanel">
        @include('OrdenTrabajo.tablas.enprogreso')
          
      </div>
      <div class="tab-pane fade" id="historial-ordenes" role="tabpanel">
        @include('OrdenTrabajo.tablas.historial')
      </div>
      
      @elseif(auth()->user()->Tipo == 'tecnico')
      
      <div class="tab-pane fade show active" id="confirmadas-ordenes" role="tabpanel">
        @include('OrdenTrabajo.tablas.confirmadas')
      </div>
      <div class="tab-pane fade" id="enprogreso-ordenes" role="tabpanel">
        @include('OrdenTrabajo.tablas.enprogreso')
      </div>
      <div class="tab-pane fade" id="historial-ordenes" role="tabpanel">
        @include('OrdenTrabajo.tablas.historial')
      </div>
      @else {{-- Cliente --}}
      <div class="tab-pane fade show active" id="confirmadas-ordenes" role="tabpanel">
        @include('OrdenTrabajo.tablas.confirmadas')
      </div>
      <div class="tab-pane fade" id="pendientes-ordenes" role="tabpanel">
        @include('OrdenTrabajo.tablas.pendientes')
      </div>
      <div class="tab-pane fade" id="enprogreso-ordenes" role="tabpanel">
        @include('OrdenTrabajo.tablas.enprogreso')
      </div>
      <div class="tab-pane fade" id="historial-ordenes" role="tabpanel">
        @include('OrdenTrabajo.tablas.historial')
      </div>
      @endif
      
    </div>
  </div> 
  
 
@endsection




