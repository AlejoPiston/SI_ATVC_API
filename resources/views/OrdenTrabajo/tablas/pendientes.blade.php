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
        @foreach ($ordenestrabajos_pendientes as $ordentrabajo)
            
        
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

          <form action="{{ url('/orden_trabajos/'.$ordentrabajo->Id.'/confirmar') }}" 
            method="POST" class="d-inline-block">
            @csrf
            <button type="submit" class="btn btn-sm btn-success" 
            data-toggle="tooltip" title="Confirmar orden de trabajo">
              <i class="ni ni-check-bold"></i>
            </button>
          </form>
          <form action="{{ url('/orden_trabajos/'.$ordentrabajo->Id.'/cancelar') }}" 
            method="POST" class="d-inline-block">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger" 
            data-toggle="tooltip" title="Cancelar orden de trabajo">
              <i class="ni ni-fat-delete"></i>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="card-body">
  {{ $ordenestrabajos_pendientes->links() }}
</div>
