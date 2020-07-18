@extends('layouts.panel')

@section('titulo', 'Panel')


@section('contenido')

<div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Editar zona</h3>
        </div>
        <div class="col text-right">
        <a href="{{ url('zonas') }}" class="btn btn-sm btn-default">
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
      <form action="{{ url('zonas/'.$zona->Id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Nombre">Nombre de la zona</label>
        <input type="text" name="Nombre" id="" class="form-control" value="{{ old('Nombre', $zona->Nombre) }}" required>
        </div>
        <div class="form-group">
          <label for="Descripcion">Descripción</label>
          <input type="text" name="Descripcion" id="" class="form-control" value="{{ old('Descripcion', $zona->Descripcion) }}" required>
      </div>
      <button type="submit" class="btn btn-primary">
          Guardar
      </button>
    </form>
    </div>
    
  </div>     
@endsection
