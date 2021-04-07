

<div class="table-responsive">
  <!-- Projects table -->
  <table class="table align-items-center table-flush">
    <thead class="thead-light">
      <tr>
        <th scope="col">Cliente</th>
          <th scope="col">Referencia</th>
          
          <th scope="col">Fecha</th>
        
          <th scope="col">Técnico</th>
          <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($ordenestrabajos_historial as $ordentrabajo)
            
        
      <tr>
        <th scope="row">
          {{ $ordentrabajo->NombreCliente }}
      </th>
      <td>
        {{ $ordentrabajo->Referencia }}
      </td>
      
      <td>
          {{ $ordentrabajo->Fecha }}
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
            <button type="button" data-whatever="{{ $ordentrabajo->Id }}" data-user=" {{ $ordentrabajo->fichaordentrabajo->Nombres }} {{ $ordentrabajo->fichaordentrabajo->Apellidos }} | {{ $ordentrabajo->Activa }} | {{ $ordentrabajo->Fecha }}" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-notification">
              <span data-toggle="tooltip" data-placement="top" title="Eliminar orden de trabajo">
                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                <span class="btn-inner--text">Eliminar</span>
              </span>
            </button>

            <div class="modal fade" id="modal-notification" tabindex="-1" aria-labelledby="modal-notification" aria-hidden="true">
              <div class="modal-dialog modal-danger modal-dialog-centered modal-">
                  <div class="modal-content bg-gradient-danger">
                    
                      <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-notification">Tu atención es requerida</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      
                      <div class="modal-body">
                        
                        
                          <div class="py-3 text-center">
                              <i class="ni ni-active-40 ni-3x"></i>
                              <h4 class="heading mt-4">¿Seguro que desea eliminar esta orden de trabajo?</h4>
                              <p>Cliente | Estado | Fecha</p> 
                              <input style="color: #070707;" type="text" class="form-control text-center text-bold" id="recipient-name" disabled>
                          </div>
                      </div>
                      
                      <div class="modal-footer">
                        <form action="" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-white" data-toggle="tooltip" 
                              data-placement="top" 
                              title="Eliminar orden de trabajo">
                              Confirmar
                          </button>
                        </form>
                          <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cerrar</button>
                      </div>
                    
                      
                  </div>
              </div>
          </div>
           <!-- First try for the online version of jQuery-->
          <script src="http://code.jquery.com/jquery.js"></script>

          <!-- Bootstrap JS -->
          <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
          <script type="text/javascript">
            $('#modal-notification').on('show.bs.modal', function (event) {
                  var button = $(event.relatedTarget) // Button that triggered the modal
                  var recipient = button.data('whatever')
                  var user = button.data('user') // Extract info from data-* attributes
                  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                  var modal = $(this)
                  modal.find('.modal-body input').val(user)
                  $('form').attr('action', '{{ url('/orden_trabajos/') }}/' + recipient)
            })
                          
          </script> 

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

<div class="card-body">
  {{ $ordenestrabajos_historial->links() }}
</div>

