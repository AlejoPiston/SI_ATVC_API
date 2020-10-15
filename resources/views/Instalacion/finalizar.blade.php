@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link')
@section('nav-link IN', 'nav-link active')
@section('nav-link Administradores', 'nav-link')
@section('nav-link Tecnicos', 'nav-link')
@section('nav-link Clientes', 'nav-link')
@section('nav-link MOT', 'nav-link')
@section('nav-link MD', 'nav-link')
@section('nav-link FOT', 'nav-link')
@section('nav-link Ubi', 'nav-link')
@section('nav-link TMA', 'nav-link')

@section('contenido')

<div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Finalizar instalación</h3>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if (session('notificacion'))
      <div class="alert alert-success" role="alert">
        {{ session('notificacion') }}
      </div> 
      @endif
      <p>Estás a punto de finalizar tu instalación confirmada para {{ $ordenTrabajo->Fecha}}:</p>
      <form action="{{ url('/instalaciones/'.$ordenTrabajo->Id.'/finalizar') }}" method="POST">
          @csrf
        <div class="form-group">
            <label for="Resultado">Por favor detalla el resultado de la atención:</label>
            <textarea name="Resultado" rows="5" class="form-control"></textarea>    
        </div>
       
        <button class="btn btn-sm btn-info" type="submit">Finalizar instalación</button>
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-default">
            Volver al listado de instalaciones
        </a>
      </form>
        
    </div>
    
    
  </div> 
 
@endsection



