

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
          @foreach ($ordenestrabajos_encamino as $ordentrabajo)
              
          
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
            <a href="{{ url('/orden_trabajos/ver/'.$ordentrabajo->Id) }}" 
              class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" 
              title="Ver orden de trabajo">
              <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
              <span class="btn-inner--text">Ver</span>
            </a>
            @if (auth()->user()->Tipo == 'administrador' || auth()->user()->Tipo == 'tecnico')
            <form action="{{ url('/orden_trabajos/'.$ordentrabajo->Id.'/solucionar') }}" 
              method="POST" class="d-inline-block">
              @csrf
              <button type="submit" class="btn btn-sm btn-warning" 
              data-toggle="tooltip" title="Solucionar orden de trabajo">
                <span class="btn-inner--icon"><i class="ni ni-compass-04"></i></span>
                <span class="btn-inner--text">Solucionar</span>
              </button>
            </form>
            @endif
            <a class="btn btn-sm btn-outline-danger" 
            href="{{ url('/orden_trabajos/'.$ordentrabajo->Id.'/cancelar') }}" data-toggle="tooltip" 
            data-placement="top" 
            title="Cancelar orden de trabajo">
              <span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span>
              <span class="btn-inner--text">Cancelar</span>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
  
  <div class="card-body">
    {{ $ordenestrabajos_encamino->links() }}
  </div>
  
  