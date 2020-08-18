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
          <h3 class="mb-0">Órdenes de Trabajo #{{ $ordenTrabajo->Id }}</h3>
        </div>
      </div>
    </div>
    <div class="card-body">
        <ul>
            <li>
                <strong>Fecha:</strong> {{ $ordenTrabajo->Fecha}}
            </li>
            <li>
                <strong>Resultado:</strong> {{ $ordenTrabajo->Resultado}}
            </li>
            <li>
                <strong>Daño:</strong> {{ $ordenTrabajo->Dano}}
            </li>
            <li>
                <strong>Técnico:</strong> {{ $ordenTrabajo->empleadoordentrabajo->name }} {{ $ordenTrabajo->empleadoordentrabajo->Apellidos }}
            </li>
            <li>
                <strong>Estado:</strong> 
                @if ($ordenTrabajo->Activa == 'cancelada')
                <span class="badge badge-danger">Cancelada</span>
                @else
                <span class="badge badge-success">{{ $ordenTrabajo->Activa }}</span>
                @endif
            </li>
        </ul>
        @if ($ordenTrabajo->Activa == 'cancelada')
        <div class="alert alert-warning">
          <p>Acerca de la cancelación:</p>
          <ul>
            @if ($ordenTrabajo->cancelacion)
              <li>
                <strong>Fecha de cancelación:</strong>
                {{ $ordenTrabajo->cancelacion->created_at }}
              </li>
              <li>
                <strong>¿Quién canceló la orden de trabajo?:</strong>
                @if (auth()->id() == $ordenTrabajo->cancelacion->Cancelado_por)
                  Tú
                @else
                  {{ $ordenTrabajo->cancelacion->Cancelado_porUser->name }} {{ $ordenTrabajo->cancelacion->Cancelado_porUser->Apellidos }}
                @endif
              </li>
              <li>
                <strong>Justificación:</strong>
                {{ $ordenTrabajo->cancelacion->Justificacion }}
              </li>
            @else
              <li>Esta cita fue cancelada antes de su confirmación.</li>
            @endif
          </ul>
        </div>
      @endif
        <a href="{{ url('orden_trabajos') }}" class="btn btn-sm btn-default">
            Volver
        </a>
    </div>
  </div> 
 
@endsection



