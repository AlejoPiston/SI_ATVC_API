@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link')
@section('nav-link IN', 'nav-link active')
@section('nav-link Administradores', 'nav-link')
@section('nav-link Tecnicos', 'nav-link')
@section('nav-link Clientes', 'nav-link')
@section('nav-link MOT', 'nav-link')
@section('nav-link Ubi', 'nav-link')
@section('nav-link MD', 'nav-link')
@section('nav-link FOT', 'nav-link')
@section('nav-link TMA', 'nav-link')

@section('styles')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<style>
  .sinborde {
    border: 0;
    background-color: #ffffff;
  }
</style>
    
@endsection

@section('contenido')
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nueva instalación</h3>
            </div>
            <div class="col text-right">
            <a href="{{ url('instalaciones') }}" class="btn btn-sm btn-default">
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
          <form action="{{ url('instalaciones') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="NombreCliente">Nombre cliente</label>
          <input type="text" name="NombreCliente" id="" class="form-control" value="{{ old('NombreCliente') }}" required>
          </div>
          <div class="form-group">
            <label for="Direccion">Dirección</label>
            <input type="text" name="Direccion" id="" class="form-control" value="{{ old('Direccion') }}" required>
        </div>
          <div class="form-group">
            <label for="Referencia">Referencia</label>
            <input type="text" name="Referencia" id="" class="form-control" value="{{ old('Referencia') }}" required>
        </div>
        <div class="form-group">
          <label for="Telefono">Teléfono / Móvil</label>
          <input type="text" name="Telefono" id="" class="form-control" value="{{ old('Telefono') }}" required>
        </div>
            
            <div class="form-group">
              <label for="Fecha">Fecha</label>
              <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
              <input id="date" name="Fecha" class="form-control datepicker" placeholder="Seleccionar fecha" 
              type="text" value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd"
              data-date-start-date="{{ date('Y-m-d') }}" data-date-end-date="+2d">
            </div>
          </div>
            <div class="form-group">
              <label for="IdEmpleado">Técnico</label>
              <div class="row">
                <div class="col">
                  <a href="{{ url('/orden_trabajos/tecnico/se/prolog') }}" class="btn btn-block btn-default" data-toggle="tooltip" 
                    data-placement="top" 
                  title="Seleccionar técnico con sistema experto">
                    <span class="btn-inner--icon"><i class="ni ni-atom"></i></span>
                    <span class="btn-inner--text">Emplear SE</span>
                  </a>
                </div>
                <div class="col">
                    <select name="IdEmpleado" id="IdEmpleado" class="form-control selectpicker" data-live-search="true" data-style="btn-outline-primary" title="Seleccione un Técnico cualquiera">
                        @foreach ($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id }}">
                            {{ $tecnico->name }} {{ $tecnico->Apellidos }} | {{ $tecnico->Cedula }}</option>
                        @endforeach
            
                    </select>
                </div>
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

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script src="{{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

@endsection




