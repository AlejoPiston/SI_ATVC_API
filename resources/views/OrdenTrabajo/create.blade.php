@extends('layouts.panel')

@section('titulo', 'Panel')


@section('contenido')


<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Nueva orden de trabajo</h3>
      </div>
      <div class="col text-right">
      <a href="{{ url('orden_trabajos') }}" class="btn btn-sm btn-default">
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
    <form action="{{ url('orden_trabajos') }}" method="post">
      @csrf
      <div class="form-group">
          <label for="Nombre">Cliente</label>
      
      <select name="" id="" class="form-control">

      </select>
      </div>
      <div class="form-group">
        <label for="Descripcion">Técnico</label>
        <select name="" id="" class="form-control">

        </select>
    </div>
    <div class="form-group">
      <label for="Descripcion">Fecha</label>
      <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
        </div>
        <input class="form-control datepicker" placeholder="Seleccionar fecha" type="text" value="06/20/2020">
    </div>
  </div>
    <button type="submit" class="btn btn-primary">
        Guardar
    </button>
  </form>
  </div>
  
</div>        
@endsection
@section('scripts')
<script src="{{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@endsection
