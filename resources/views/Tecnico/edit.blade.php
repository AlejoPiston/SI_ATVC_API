@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link')
@section('nav-link IN', 'nav-link')
@section('nav-link Administradores', 'nav-link')
@section('nav-link Tecnicos', 'nav-link active')
@section('nav-link Clientes', 'nav-link')
@section('nav-link MOT', 'nav-link')
@section('nav-link MD', 'nav-link')
@section('nav-link Ubi', 'nav-link')
@section('nav-link FOT', 'nav-link')
@section('nav-link TMA', 'nav-link')

@section('contenido')

<div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Editar Técnico</h3>
        </div>
        <div class="col text-right">
        <a href="{{ url('tecnicos') }}" class="btn btn-sm btn-default">
              Cancelar y volver
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if ($errors->any())
          <div class="alert alert-danger" role="alert">
              <ul>
                @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
          
      @endif
      <form action="{{ url('tecnicos/'.$tecnico->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombres</label>
        <input type="text" name="name" id="" class="form-control" value="{{ old('name', $tecnico->name) }}" required>
        </div>
        <div class="form-group">
          <label for="Apellidos">Apellidos</label>
          <input type="text" name="Apellidos" id="" class="form-control" value="{{ old('Apellidos', $tecnico->Apellidos) }}" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" name="email" id="" class="form-control" value="{{ old('email', $tecnico->email) }}" required>
    </div>
      <div class="form-group">
        <label for="Cedula">Cédula</label>
        <input type="text" name="Cedula" id="" class="form-control" value="{{ old('Cedula', $tecnico->Cedula) }}" required>
    </div>
        <div class="form-group">
          <label for="Direccion">Dirección</label>
          <input type="text" name="Direccion" id="" class="form-control" value="{{ old('Direccion', $tecnico->Direccion) }}" required>
      </div>
      <div class="form-group">
        <label for="Telefono">Teléfono / Móvil</label>
        <input type="text" name="Telefono" id="" class="form-control" value="{{ old('Telefono', $tecnico->Telefono) }}" required>
      </div>
      <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="text" name="password" class="form-control" value="">
          <p>Ingrese un valor solo si desea modificar la contraseña.</p>
      </div>
    
      <button type="submit" class="btn btn-primary">
          Guardar
      </button>
    </form>
    </div>
    
  </div>     
@endsection
