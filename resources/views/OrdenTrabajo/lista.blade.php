@extends('layouts.panel')

@section('titulo', 'Panel')


@section('contenido')

<div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Órdenes de Trabajo</h3>
        </div>
        <div class="col text-right">
        <a href="{{ url('/orden_trabajos/create') }}" class="btn btn-sm btn-success">
              Nueva orden de trabajo
          </a>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Cliente Ficha</th>
            <th scope="col">Fecha</th>
            <th scope="col">Daño</th>
            <th scope="col">Resultado</th>
            <th scope="col">Técnico</th>
            <th scope="col">Estado</th>
            <th scope="col">Fecha/Hora Arrivo</th>
            <th scope="col">Fecha/Hora Salida</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($ordenestrabajos as $ordentrabajo)
                
            
          <tr>
            <th scope="row">
                {{ $ordentrabajo->IdFicha }}
            </th>
            <td>
                {{ $ordentrabajo->Fecha }}
            </td>
            <td>
                {{ $ordentrabajo->Dano }}
            </td>
            <td>
                {{ $ordentrabajo->Resultado }}
            </td>
            <td>
                {{ $ordentrabajo->IdEmpleado }}
            </td>
            <td>
                {{ $ordentrabajo->Activa }}
            </td>
            <td>
                {{ $ordentrabajo->FechaHoraArrivo }}
            </td>
            <td>
                {{ $ordentrabajo->FechaHoraSalida }}
            </td>
            <td>
                <a href="{{ url('/orden_trabajos/create') }}" class="btn btn-sm btn-primary">
                    Editar
                </a>
                <a href="{{ url('/orden_trabajos/create') }}" class="btn btn-sm btn-danger">
                    Eliminar
                </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-body">
        {{ $ordenestrabajos->links() }}
    </div>
    
  </div>     
@endsection
