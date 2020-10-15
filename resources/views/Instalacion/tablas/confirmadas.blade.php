

<div class="table-responsive">
  <!-- Projects table -->
  <table class="table align-items-center table-flush">
    <thead class="thead-light">
      <tr>
        <th scope="col">Cliente</th>
        <th scope="col">Referencia</th>
        <th scope="col">Estado</th>
        <th scope="col">Fecha</th>
        <th scope="col">Tipo</th>
        <th scope="col">Resultado</th>
        <th scope="col">Técnico</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($ordenestrabajos_confirmadas as $ordentrabajo)

      <tr>
        <th scope="row">
            {{ $ordentrabajo->NombreCliente }}
        </th>
        <td>
          {{ $ordentrabajo->Referencia }}
        </td>
        <td>
          {{ $ordentrabajo->Activa }}
        </td>
        <td>
            {{ $ordentrabajo->Fecha }}
        </td>
        <td>
            {{ $ordentrabajo->Tipo }}
        </td>
        <td>
            {{ $ordentrabajo->Resultado }}
        </td>
        <td>
            {{ $ordentrabajo->empleadoordentrabajo->name }} {{ $ordentrabajo->empleadoordentrabajo->Apellidos }} 
        </td>
        <td>
          <a href="{{ url('/instalaciones/ver/'.$ordentrabajo->Id) }}" 
            class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" 
            title="Ver orden de trabajo">
            <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
            <span class="btn-inner--text">Ver</span>
          </a>
          @if (auth()->user()->Tipo == 'administrador' || auth()->user()->Tipo == 'tecnico')
          <form action="{{ url('/instalaciones/'.$ordentrabajo->Id.'/atender') }}" 
            method="POST" class="d-inline-block">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-info" 
            data-toggle="tooltip" title="Atender orden de trabajo">
              <span class="btn-inner--icon"><i class="ni ni-bus-front-12"></i></span>
              <span class="btn-inner--text">Atender</span>
            </button>
          </form>
          @endif
          <a class="btn btn-sm btn-outline-danger" 
          href="{{ url('/instalaciones/'.$ordentrabajo->Id.'/cancelar') }}" data-toggle="tooltip" 
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
  {{ $ordenestrabajos_confirmadas->links() }}
</div>

