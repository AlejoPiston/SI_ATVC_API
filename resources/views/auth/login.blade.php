@extends('layouts.inicio')

@section('titulo', 'Inicio de Sesión')
@section('subtitulo', 'Ingresa tus datos para Iniciar Sesión')

@section('contenido')
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary border-0 mb-0">
          
          <div class="card-body px-lg-5 py-lg-5">
            
            <form role="form" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control @error('email') is-invalid @enderror" 
                  placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus>
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
                  <input class="form-control @error('password') is-invalid @enderror" 
                  placeholder="Contraseña" type="password" name="password" required>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input" id=" remember" type="checkbox" name="remember" 
                {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for=" remember">
                  <span class="text-muted">Recordar sesión</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Ingresar</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6">
            <a href="{{ route('password.request') }}" class="text-light"><small>¿Olvidaste tu contraseña?</small></a>
          </div>
          <div class="col-6 text-right">
            <a href="{{ route('register') }}" class="text-light"><small>¿Aún no te has registrado?</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection





