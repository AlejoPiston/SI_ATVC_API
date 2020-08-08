@extends('layouts.inicio')

@section('titulo', 'Restablecer la contraseña')
@section('subtitulo', 'Ingresa tu dirección de correo electrónico')

@section('contenido')
<div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card bg-secondary border-0">
          <div class="card-body px-lg-5 py-lg-5">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
              
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
              
              <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">Enviar enlace de restablecimiento de contraseña</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
