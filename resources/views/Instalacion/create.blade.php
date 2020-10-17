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
              <label for="NombreCliente">Nombre cliente:</label>
          <input onkeyup="activar_btn_Ubicacion()" type="text" name="NombreCliente" id="NombreCliente" class="form-control" value="{{ old('NombreCliente') }}" required>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="Telefono">Teléfono / Móvil:</label>
                <input onkeyup="activar_btn_Ubicacion()" type="text" name="Telefono" id="Telefono" class="form-control" value="{{ old('Telefono') }}" required>
              </div>
            </div>
            <div class="col">
          <div class="form-group">
            <label for="Fecha">Fecha:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
              </div>
            <input id="date" name="Fecha" class="form-control datepicker" placeholder="Seleccionar fecha" 
            type="text" value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd"
            data-date-start-date="{{ date('Y-m-d') }}" data-date-end-date="+2d">
          </div>
        </div>
      </div>
        </div>
        <div class="row">


          <div class="col">
            <button type="button" 
            class="btn btn-block btn-danger mb-3" 
            data-toggle="modal" data-target="#modal-default" id="btn_Ubicacion" disabled>
            <span data-toggle="tooltip" data-placement="top" title="Encontrar ubicación del nuevo cliente">
                <span class="btn-inner--icon"><i class="ni ni-pin-3"></i></span>
                      <span class="btn-inner--text">Ingresar dirección</span>
              </span>
          </button>
  
            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                
                  <div class="modal-header">
                      <h6 class="modal-title" id="modal-title-default">Seleccionar ubicación</h6>
                  </div>
                  
                  <div class="modal-body">
                    <header class="masthead mb-auto">
                      
                    </header>
                    <div class="form-group">
                      <input type="text" onkeyup="activar_btn_Ubicacion()" 
                      placeholder="Ingrese una ciudad" name="Direccion2" id="Direccion2" class="form-control" value="{{ old('Referencia2') }}" required>
                  </div>
                  <div class="form-group">
                    <input type="text" onkeyup="activar_btn_Ubicacion()" 
                    placeholder="Ingrese una dirección" name="Referencia2" id="Referencia2" class="form-control" value="{{ old('Direccion2') }}" required>
                </div>
                    <main role="main" class="inner cover">
                      <div class="row">
                        <div class="col-md-4">
                            <input type="text"  id="txtLat" class="form-control" placeholder="Latitud" disabled>
                            
                          </div>
                          <div class="col-md-4">
                            <input type="text" id="txtLng" class="form-control" placeholder="Longitud" disabled>
                            
                          </div>
                      </div>
                    <div id="map_canvas" style="height:350px">
            
                    </div>
                    
                  </main>
                      
                  </div>
                  
                  <div class="modal-footer">
                      <button type="button" id="btn_Seleccionar" 
                      class="btn btn-primary" data-dismiss="modal" disabled>Seleccionar</button>
                  </div>
                  
              </div>
          </div>
      </div>
      
        </div>
            <div class="col">
              <div class="form-group">
                <input placeholder="Ciudad" type="text" name="Direccion1" id="Direccion1" class="form-control" value="{{ old('Direccion1') }}" disabled>
            </div>

            </div>
            <div class="col">
              <div class="form-group">
                <input placeholder="Dirección" type="text" name="Referencia1" id="Referencia1" class="form-control" value="{{ old('Referencia1') }}" disabled>
            </div>
              
            </div>
        </div>

      <br/>
            <div class="form-group">
              <label for="IdEmpleado">Técnico:</label>
              <div class="row">
                <div class="col">
                  <button onclick="onTecnicosLoaded()" type="button" class="btn btn-block btn-default mb-3" id="btn_SE" disabled>
                      <span data-toggle="tooltip" data-placement="top" title="Seleccionar técnico con sistema experto">
                          <span class="btn-inner--icon"><i class="ni ni-atom"></i></span>
                                <span class="btn-inner--text">Emplear SE</span>
                        </span>
                  </button>
                </div>
                <div class="col">
                    <select onchange="activar_btn_Guardar()" 
                    name="IdEmpleado" id="IdEmpleado" class="form-control selectpicker" 
                    data-live-search="true" data-style="btn-outline-primary" 
                    title="Seleccione un Técnico cualquiera" disabled>
                        @foreach ($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id }}">
                            {{ $tecnico->name }} {{ $tecnico->Apellidos }} | {{ $tecnico->Cedula }}</option>
                        @endforeach
            
                    </select>
                </div>
            </div>
              
          </div>
          <input type="hidden" name="Direccion" id="Direccion">
          <input type="hidden" name="Referencia" id="Referencia">
          <input type="hidden" name="Latitud" id="Latitud">
          <input type="hidden" name="Longitud" id="Longitud">


          <button type="submit" class="btn btn-primary" id="btn_Guardar" disabled>
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

<script type="text/javascript" 
        src="https://maps.googleapis.com/maps/api/js?key={{config('googlemap')['map_apikey']}}"></script>
<script src="{{ asset('/js/instalacion/maps.js') }}"></script>
<script src="{{ asset('/js/instalacion/create.js') }}"></script>

@endsection




