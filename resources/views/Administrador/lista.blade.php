@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link')
@section('nav-link Administradores', 'nav-link active')
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
          <h3 class="mb-0">Administradores</h3>
        </div>
        <div class="col text-right">
        <a href="{{ url('/administradores/create') }}" class="btn btn-sm btn-success">
              Nuevo administrador
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
    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">E-mail</th>
            <th scope="col">Cédula </th>
            <th scope="col">Dirección </th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($administradores as $administrador)
                
            
          <tr>
            <th scope="row">
                {{ $administrador->name }} {{ $administrador->Apellidos }}
            </th>
            <td>
                {{ $administrador->email }}
            </td>
            <td>
              {{ $administrador->Cedula }}
            </td>
            <td>
              {{ $administrador->Direccion }}
            </td>
            <td>
                <form action="{{ url('/administradores/'.$administrador->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{ url('/administradores/'.$administrador->id.'/edit') }}" class="btn btn-sm btn-primary">
                    Editar
                  </a>
                  <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-body">
        {{ $administradores->links() }}
    </div>
    
  </div>     
@endsection
