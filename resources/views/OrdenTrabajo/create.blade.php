@extends('layouts.panel')

@section('titulo', 'Panel')

@section('styles')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    
@endsection

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
          <label for="IdFicha">Cliente</label>
      
      <select name="IdFicha" id="IdFicha" 
      class="form-control selectpicker" 
      data-live-search="true" data-style="btn-outline-primary"
      title="Seleccione un Cliente">
        @foreach ($clientes as $cliente)
      <option value="{{ $cliente->Id }}">{{ $cliente->Nombres }} | {{ $cliente->CedulaRuc }}</option>
        @endforeach

      </select>
      </div>
      <div class="form-group">
        <label for="Dano">Daño</label>

        <select name="Dano" id="Dano" 
        class="form-control selectpicker" 
        data-style="btn-outline-primary" title="Seleccione uno o más daños" multiple>
          <option value="Internet">Internet</option>
          <option value="Televisión">Televisión</option>
        </select>
        
      </div>
      <div class="form-group">
        <label for="Fecha">Fecha</label>
        <div class="input-group">
          <div class="input-group-prepend">
              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
          </div>
          <input name="Fecha" class="form-control datepicker" placeholder="Seleccionar fecha" type="text" value="06/20/2020">
      </div>
    </div>
      <div class="form-group">
        <label for="IdEmpleado">Técnico</label>
        <select name="IdEmpleado" id="IdEmpleado" class="form-control selectpicker" data-live-search="true" data-style="btn-outline-primary"
        title="Seleccione un Técnico">
        @foreach ($tecnicos as $tecnico)
          <option value="{{ $tecnico->id }}">{{ $tecnico->name }} | {{ $tecnico->Cedula }}</option>
         @endforeach

        </select>
    </div>
    <button type="submit" class="btn btn-primary">
        Guardar
    </button>
  </form>
  </div>
  
</div>        
@endsection
@section('scripts')

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script src="{{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@endsection
