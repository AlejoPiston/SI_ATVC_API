

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
        @foreach ($ordenestrabajos_enprogreso as $ordentrabajo)
            
        
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
          <a class="btn btn-sm btn-info" 
          href="{{ url('/instalaciones/'.$ordentrabajo->Id.'/finalizar') }}" data-toggle="tooltip" 
          data-placement="top" 
          title="Finalizar orden de trabajo">
            <span class="btn-inner--icon"><i class="ni ni-book-bookmark"></i></span>
            <span class="btn-inner--text">Finalizar</span>
          </a>
          @endif
          
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="card-body">
  {{ $ordenestrabajos_enprogreso->links() }}
</div>
