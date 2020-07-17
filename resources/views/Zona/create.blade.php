@extends('layouts.panel')

@section('titulo', 'Panel')


@section('contenido')

<div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Nueva zona</h3>
        </div>
        <div class="col text-right">
        <a href="{{ url('/zonas/create') }}" class="btn btn-sm btn-success">
              Nueva orden de trabajo
          </a>
        </div>
      </div>
    </div>
    <form action="">
        <div class="form-group">
            <label for="name"></label>

        </div>
    </form>
  </div>     
@endsection
