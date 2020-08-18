@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link')
@section('nav-link Administradores', 'nav-link')
@section('nav-link Tecnicos', 'nav-link active')
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
          <h3 class="mb-0">Técnicos</h3>
        </div>
        <div class="col text-right">
        <a href="{{ url('/tecnicos/create') }}" class="btn btn-sm btn-success">
              Nuevo técnico
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
            <th scope="col">Direección</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tecnicos as $tecnico)
                
            
          <tr>
            <th scope="row">
                {{ $tecnico->name }} {{ $tecnico->Apellidos }}
            </th>
            <td>
                {{ $tecnico->email }}
            </td>
            <td>
              {{ $tecnico->Cedula }}
            </td>
            <td>
              {{ $tecnico->Direccion }}
            </td>
            <td>
                <form action="{{ url('/tecnicos/'.$tecnico->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{ url('/tecnicos/'.$tecnico->id.'/edit') }}" class="btn btn-sm btn-primary">
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
        {{ $tecnicos->links() }}
    </div>
    
  </div>     
@endsection
