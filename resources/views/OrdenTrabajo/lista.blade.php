@extends('layouts.panel')

@section('titulo', 'Panel')


@section('contenido')

<div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Órdenes de Trabajo</h3>
        </div>
        <div class="col text-right">
        <a href="{{ url('/orden_trabajos/create') }}" class="btn btn-sm btn-success">
              Nueva orden de trabajo
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

    
        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" 
                data-toggle="tab" 
                href="#ot_enprogreso" role="tab"  
                aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Mis órdenes en progreso</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" 
                data-toggle="tab" href="#ot_pendientes" role="tab"  
                aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Órdenes por confirmar</a>
            </li>
        </ul>
    
    </div>
    
          <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="ot_enprogreso" role="tabpanel">
                @include('OrdenTrabajo.ot_enprogreso')
              </div>
              <div class="tab-pane fade" id="ot_pendientes" role="tabpanel" >
                  @include('OrdenTrabajo.ot_pendientes')
              </div>
          </div>
  </div>     
@endsection
