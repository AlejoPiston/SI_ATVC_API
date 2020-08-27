@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link')
@section('nav-link Administradores', 'nav-link active')
@section('nav-link Tecnicos', 'nav-link')
@section('nav-link Clientes', 'nav-link')
@section('nav-link MOT', 'nav-link')
@section('nav-link MD', 'nav-link')
@section('nav-link FOT', 'nav-link')
@section('nav-link Ubi', 'nav-link')
@section('nav-link TMA', 'nav-link')
@section('header')
<div class="container-fluid">
  <div class="header-body">
<div class="row align-items-center py-4">
  <div class="col-lg-8">
    <h6 class="h2 text-white d-inline-block mb-0">{{ Auth::user()->Tipo }}</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Gestionar</li>
        <li class="breadcrumb-item"><a href="{{ url('/administradores') }}">Administradores</a></li>
      </ol>
    </nav>
  </div>  
</div>
</div>
</div>
@endsection

@section('contenido')

<div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Administradores</h3>
        </div>
        <div class="col text-right">
        <a href="{{ url('/administradores/create') }}" class="btn btn-success" data-toggle="tooltip" 
            data-placement="top" 
            title="Registrar nuevo administrador">
            <span class="btn-inner--icon"><i class="ni ni-single-02"></i></span>
            <span class="btn-inner--text">Nuevo</span>
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if (session('notificacion'))
      <div class="alert alert-success" role="alert">
        {{ session('notificacion') }}
      </div> 
      @endif
    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">E-mail</th>
            <th scope="col">Cédula </th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($administradores as $administrador)
                
            
          <tr>
            <th scope="row">
                {{ $administrador->name }} {{ $administrador->Apellidos }}
            </th>
            <td>
                {{ $administrador->email }}
            </td>
            <td>
              {{ $administrador->Cedula }}
            </td>
            <td>
              <a href="{{ url('/administradores/'.$administrador->id) }}" 
                class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" 
                title="Ver datos del administrador">
                <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                <span class="btn-inner--text">Ver</span>
              </a>
              <a href="{{ url('/administradores/'.$administrador->id.'/edit') }}" 
                class="btn btn-sm btn-secundary" data-toggle="tooltip" data-placement="top" 
                title="Editar datos del administrador">
                <span class="btn-inner--icon"><i class="ni ni-ruler-pencil"></i></span>
                <span class="btn-inner--text">Editar</span>
              </a>
              <button type="button" data-whatever="{{ $administrador->id }}" data-user="{{ $administrador->name }} {{ $administrador->Apellidos }} | {{ $administrador->Cedula }}" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-notification">
                <span data-toggle="tooltip" data-placement="top" title="Eliminar administrador">
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
                                    <h4 class="heading mt-4">¿Está seguro que desea eliminar este administrador?</h4>
                                    <p>Nombre | Cédula</p> 
                                    <input style="color: #070707;" type="text" class="form-control text-center text-bold" id="recipient-name" disabled>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                              <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" class="btn btn-white" data-toggle="tooltip" 
                                    data-placement="top" 
                                    title="Eliminar administrador">
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
                        $('form').attr('action', '{{ url('/administradores/') }}/' + recipient)
                  })
                                
                </script> 
                
                
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-body">
        {{ $administradores->links() }}
    </div>
    
  </div>     
@endsection
