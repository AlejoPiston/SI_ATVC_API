@extends('layouts.inicio')

@section('titulo', 'Registro')
@section('subtitulo', 'Ingresa tus datos para registrarte')
@section('styles')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    
@endsection

@section('contenido')
<div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card bg-secondary border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <form role="form" method="POST" action="{{ route('register') }}">
                @csrf
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                  </div>
                  <input placeholder="Nombres" id="name" type="text" 
                  class="form-control @error('name') is-invalid @enderror" 
                  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
              <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                </div>
                <input placeholder="Apellidos" id="Apellidos" type="text" 
                class="form-control @error('Apellidos') is-invalid @enderror" 
                name="Apellidos" value="{{ old('Apellidos') }}" required autocomplete="Apellidos" autofocus>
                @error('Apellidos')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                </div>
                <input placeholder="Cedula" id="Cedula" type="text" 
                class="form-control @error('Cedula') is-invalid @enderror" 
                name="Cedula" value="{{ old('Cedula') }}" required autocomplete="Cedula" autofocus>
                @error('Cedula')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-active-40"></i></span>
                </div>
                <select name="Tipo" id="Tipo" type="text"
                class="form-control selectpicker @error('Tipo') is-invalid @enderror" 
                 title="Seleccione un rol"
                value="{{ old('Tipo') }}" required autocomplete="Tipo" autofocus>
                  <option value="tecnico">Técnico</option>
                  <option value="cliente">Cliente</option>
                </select>
                @error('Tipo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                
              </div>
            </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" 
                  name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input placeholder="Contraseña" id="password" type="password" 
                  class="form-control @error('password') is-invalid @enderror" 
                  name="password" required autocomplete="new-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input placeholder="Confirmar contraseña" id="password-confirm" 
                  type="password" class="form-control" 
                  name="password_confirmation" required autocomplete="new-password">
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">Confirmar registro</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script src="{{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@endsection