@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link active')
@section('nav-link IN', 'nav-link')
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
<div class="row">
  <div class="col-xl-4 order-xl-2">
    <div class="card card-profile">
      <img src="{{ asset('img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder" class="card-img-top">
      <div class="row justify-content-center">
        <div class="col-lg-3 order-lg-2">
          <div class="card-profile-image">
            <a>
              <img src="{{ asset('img/theme/hombre.png') }}" class="rounded-circle">
            </a>
          </div>
        </div>
      </div>
      <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
        <div class="d-flex justify-content-between">
          
        </div>
      </div>
      <div class="card-body pt-0">
        <div class="row">
          <div class="col">
            <div class="card-profile-stats d-flex justify-content-center">
              <div>
                <span class="heading" id="cuotaFicha"></span>
                <span class="description">Cuota</span>
              </div>
              <div>
                <span class="heading" id="zonaFicha"></span>
                <span class="description">Zona</span>
              </div>
              <div>
                <span class="heading" id="estadoFicha"></span>
                <span class="description">Estado</span>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center">
          <p id="servicioFicha"></p>
          <h5 class="h3" id="nombresFicha">
          </h5>
          <div class="h5 font-weight-300">
            <i class="ni location_pin mr-2" id="cedulaFicha"></i>
          </div>
          <div class="h5 mt-4" id="direccionFicha">
            <i class="ni business_briefcase-24 mr-2"></i>
          </div>
          <div id="telefonoFicha">
            <i class="ni education_hat mr-2"></i>
          </div>
        </div>
      </div>
    </div>
  </div> 
    <div class="col-xl-8 order-xl-1">
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
                <label for="Ficha">Cliente</label>
            
            <select onchange="activar_btn_SE()" name="IdFicha" id="Ficha" 
            class="form-control selectpicker" 
            data-live-search="true" data-style="btn-outline-primary"
            title="Seleccione una Ficha">
              @foreach ($fichas as $ficha)
            <option value="{{ $ficha->Id }}">{{ $ficha->Nombres }} {{ $ficha->Apellidos }} | {{ $ficha->CedulaRuc }}</option>
              @endforeach

            </select>
            </div>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Cuenta de usuario</span>
                </div>
                <input type="text" id="tieneCliente" class="form-control" value="{{ old('IdCliente') }}" disabled>
                <input type="hidden" name="IdCliente" id="Cliente">
            </div>
          </div>
            <div class="form-group">
              <label for="Dano">Daño</label>

              <select onchange="activar_btn_SE()" name="Dano" id="ordentrabajoDano" 
              class="form-control selectpicker" 
              data-style="btn-outline-primary" title="Seleccione uno o más daños">
                <optgroup label="Internet">
                  <option value="Lentitud">Lentitud</option>
                  <option value="Foco rojo">Foco rojo</option>
                  <option value="Intermitencia">Intermitencia</option>
                  <option value="Cambio de cable">Cambio de cable</option>
                  <option value="Rotura de fibra">Rotura de fibra</option>
                  <option value="Configuración de equipos">Configuración de equipos</option>
                </optgroup>
                <optgroup label="Televisión">
                  <option value="Canales">Canales</option>
                  <option value="Antena">Antena</option>
                </optgroup>
              </select>
              
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
                  
                <button onclick="onTecnicosLoaded()" type="button" class="btn btn-block btn-default mb-3" id="btn_SE" disabled>
                    <span data-toggle="tooltip" data-placement="top" title="Seleccionar técnico con sistema experto">
                        <span class="btn-inner--icon"><i class="ni ni-atom"></i></span>
                              <span class="btn-inner--text">Emplear SE</span>
                      </span>
                </button>
               

                </div>
                <div class="col">
                    <select onchange="activar_btn_Guardar()" name="IdEmpleado" id="IdEmpleado" 
                    class="form-control selectpicker" data-live-search="true" 
                    data-style="btn-outline-primary" title="Seleccione un Técnico cualquiera" disabled>
                        @foreach ($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id }}">
                            {{ $tecnico->name }} {{ $tecnico->Apellidos }} | {{ $tecnico->Cedula }}</option>
                        @endforeach
            
                    </select>
                </div>
                
            </div>
            <div id="optimos"></div>

            <div id="tabla"></div>
            
              
          </div>
          <button id="btn_Guardar" type="submit" class="btn btn-primary" disabled>
              Guardar
          </button>
        </form>
        </div>
        
      </div>   
    </div>   
    
</div>       





@endsection
@section('scripts')

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script src="{{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/js/ordentrabajo/create.js') }}"></script>
<script>
 $.fn.selectpicker.Constructor.DEFAULTS.noneResultsText ='No hay coincidencias{0}';
</script>

@endsection




