@extends('layouts.panel')

@section('titulo', 'Panel')


@section('contenido')

<div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Zonas</h3>
        </div>
        <div class="col text-right">
        <a href="{{ url('/zonas/create') }}" class="btn btn-sm btn-success">
              Nueva zona
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
            <th scope="col">Descripción</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($zonas as $zona)
                
            
          <tr>
            <th scope="row">
                {{ $zona->Nombre }}
            </th>
            <td>
                {{ $zona->Descripcion }}
            </td>
            <td>
                <form action="{{ url('/zonas/'.$zona->Id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{ url('/zonas/'.$zona->Id.'/edit') }}" class="btn btn-sm btn-primary">
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
        {{ $zonas->links() }}
    </div>
    
  </div>     
@endsection
