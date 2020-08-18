

<div class="table-responsive">
  <!-- Projects table -->
  <table class="table align-items-center table-flush">
    <thead class="thead-light">
      <tr>
        <th scope="col">Cliente</th>
        <th scope="col">Estado</th>
        <th scope="col">Fecha</th>
        <th scope="col">Daño</th>
        <th scope="col">Resultado</th>
        <th scope="col">Técnico</th>
        <th scope="col">Fecha/Hora Arrivo</th>
        <th scope="col">Fecha/Hora Salida</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($ordenestrabajos_confirmadas as $ordentrabajo)
            
        
      <tr>
        <th scope="row">
            {{ $ordentrabajo->fichaordentrabajo->Nombres }} {{ $ordentrabajo->fichaordentrabajo->Apellidos }}
        </th>
        <td>
          {{ $ordentrabajo->Activa }}
        </td>
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
            {{ $ordentrabajo->empleadoordentrabajo->name }} {{ $ordentrabajo->empleadoordentrabajo->Apellidos }} 
        </td>
        <td>
            {{ $ordentrabajo->FechaHoraArrivo }}
        </td>
        <td>
            {{ $ordentrabajo->FechaHoraSalida }}
        </td>
        <td>
          <a href="{{ url('/orden_trabajos/ver/'.$ordentrabajo->Id) }}" title="Ver orden de trabajo" class="btn btn-sm btn-primary">
            Ver
          </a>
          <form action="{{ url('/orden_trabajos/'.$ordentrabajo->Id.'/confirmar') }}" 
            method="POST" class="d-inline-block">
            @csrf
            <button type="submit" class="btn btn-sm btn-success" 
            data-toggle="tooltip" title="Atender orden de trabajo">
              <i class="ni ni-check-bold"></i>
            </button>
          </form>
          <a class="btn btn-sm btn-danger" href="{{ url('/orden_trabajos/'.$ordentrabajo->Id.'/cancelar') }}">
            Cancelar
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


<div class="card-body">
  {{ $ordenestrabajos_confirmadas->links() }}
</div>

