@extends('layouts.panel')

@section('titulo', 'Panel')


@section('contenido')

<div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Clientes</h3>
        </div>
        <div class="col text-right">
        <a href="{{ url('/clientes/create') }}" class="btn btn-sm btn-success">
              Nuevo cliente
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
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                
            
          <tr>
            <th scope="row">
                {{ $cliente->name }}
            </th>
            <td>
                {{ $cliente->email }}
            </td>
            <td>
              {{ $cliente->Cedula }}
            </td>
            <td>
                <form action="{{ url('/clientes/'.$cliente->Id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{ url('/clientes/'.$cliente->Id.'/edit') }}" class="btn btn-sm btn-primary">
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
        {{ $clientes->links() }}
    </div>
    
  </div>     
@endsection
