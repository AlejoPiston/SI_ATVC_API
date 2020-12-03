

<div class="table-responsive">
  <!-- Projects table -->
  <table class="table align-items-center table-flush">
    <thead class="thead-light">
      <tr>
        <th scope="col">Cliente</th>
        <th scope="col">Estado</th>
        <th scope="col">Técnico</th>
       
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($ordenestrabajos_historial as $ordentrabajo)
            
        
      <tr>
        <th scope="row">
            {{ $ordentrabajo->fichaordentrabajo->Nombres }} {{ $ordentrabajo->fichaordentrabajo->Apellidos }}
        </th>
        <td>
          {{ $ordentrabajo->Activa }}
        </td>
        <td>
            {{ $ordentrabajo->empleadoordentrabajo->name }} {{ $ordentrabajo->empleadoordentrabajo->Apellidos }} 
        </td>
        
        <td>
            <a href="{{ url('/orden_trabajos/ver/'.$ordentrabajo->Id) }}" 
              class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" 
              title="Ver orden de trabajo">
              <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
              <span class="btn-inner--text">Ver</span>
            </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

<div class="card-body">
  {{ $ordenestrabajos_historial->links() }}
</div>

