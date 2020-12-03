
<div class="table-responsive">
  <!-- Projects table -->
  <table class="table align-items-center table-flush">
    <thead class="thead-light">
      <tr>
        <th scope="col">Cliente</th>
        <th scope="col">Fecha</th>
        <th scope="col">Daño</th>
        <th scope="col">Técnico</th>
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
            {{ $ordentrabajo->Fecha }}
        </td>
        <td>
            {{ $ordentrabajo->Dano }}
        </td>
        <td>
            {{ $ordentrabajo->empleadoordentrabajo->name }} {{ $ordentrabajo->empleadoordentrabajo->Apellidos }} 
        </td>
        <td>
          @if (auth()->user()->Tipo == 'administrador')
          <a href="{{ url('/orden_trabajos/ver/'.$ordentrabajo->Id) }}" 
            class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" 
            title="Ver orden de trabajo">
            <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
            <span class="btn-inner--text">Ver</span>
          </a>
          <form action="{{ url('/orden_trabajos/'.$ordentrabajo->Id.'/confirmar') }}" 
            method="POST" class="d-inline-block">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-success" 
            data-toggle="tooltip" title="Confirmar orden de trabajo">
            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
            <span class="btn-inner--text">Confirmar</span>
            </button>
          </form>
          @endif
          <form action="{{ url('/orden_trabajos/'.$ordentrabajo->Id.'/cancelar') }}" 
            method="POST" class="d-inline-block">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-danger" 
            data-toggle="tooltip" title="Cancelar orden de trabajo">
            <span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span>
            <span class="btn-inner--text">Cancelar</span>
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
