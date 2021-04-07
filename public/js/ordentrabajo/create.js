let $dano, $fecha, $optimos;
$(function () {
    $ficha = $('#Ficha');
    $dano = $('#ordentrabajoDano');
    $descripcion_Dano = $('#Descripcion');
    $fecha = $('#date');
    $optimos = $('#optimos');
    $tabla = $('#tabla');
    $tabla2 = $('#tabla2');
    $tabla3 = $('#tabla3');
    $ficha.change(() => {
      const fichaId = $ficha.val();
      const url = `/orden_trabajos/${fichaId}/ficha`;
      $.getJSON(url, onClienteLoaded);
    });
    //$dano.change(onTecnicosLoaded);
    //$fecha.change(onTecnicosLoaded);
  });    

  function onClienteLoaded(client) {
    
    if((client.Nombres != null)&&(client.Apellidos !=null)){
      $('#nombresFicha').html(client.Nombres+' '+client.Apellidos);
    }else{
      $('#nombresFicha').html(client.Nombres);
    }

    if(client.CedulaRuc != null){
      $('#cedulaFicha').html(client.CedulaRuc);
    }else{
      $('#cedulaFicha').html('-------------');
    }
    
    if(client.ValorMensual != null){
      $('#cuotaFicha').html('$'+client.ValorMensual);
    }else{
      $('#cuotaFicha').html('-');
    }
    
    if(client.zonaficha != null){
      $('#zonaFicha').html(client.zonaficha.Nombre);
    }else{
      $('#zonaFicha').html("-");
    }
    
    if (client.Estado == 1) {
      $('#estadoFicha').html("✓");
    } else if(client.Estado == 0) {
      $('#estadoFicha').html("✗");
    }else if(client.Estado == null) {
      $('#estadoFicha').html("-");
    }
    if(client.servicioficha != null){
      $('#servicioFicha').html(client.servicioficha.Nombre);
    }else{
      $('#servicioFicha').html('--------');
    }
    $('#direccionFicha').html(client.DireccionDomicilio);
    $('#telefonoFicha').html(client.TelefonoDomicilio);
    if (client.IdUsuario == null) {
      $('#tieneCliente').val("No");
      $('#Cliente').val(client.IdUsuario);
    } else {
      $('#tieneCliente').val("Si");
      $('#Cliente').val(client.IdUsuario);
    }
    //onTecnicosLoaded();
  }
  function onTecnicosLoaded() {
    const selectedDano = $dano.val();
    const selectedFecha = $fecha.val();
    const fichaId = $ficha.val();
    const descripcionDano = $descripcion_Dano.val();
    const url = `/orden_trabajos/tecnico/se?ficha=${fichaId}&dano=${selectedDano}&date=${selectedFecha}&danoDes=${descripcionDano}`;
    $.getJSON(url, displayTecnicos);
  }
  function displayTecnicos(data) {
    //console.log(data);
    $optimos.html(`
        <div class="alert alert-success" role="alert">
          <strong>Los mejores opcionados</strong>
          <button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#modal-form">Ver detalle</button>
        </div>`);
    $tabla.html(`<div class="table-responsive">
    <table class="table align-items-center table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="sort" data-sort="name">Técnico</th>
                <th scope="col" class="sort" data-sort="completion">Nº órdenes de trabajo</th>
                <th scope="col" class="sort" data-sort="completion">Nº meses de trabajo</th>
                <th scope="col" class="sort" data-sort="completion">Distancia hacia la orden</th>
                <th scope="col" class="sort" data-sort="completion">Tiempo estimado de tareas</th>
            </tr>
        </thead>
        <tbody id="res" class="list">      
           
        </tbody>
    </table>
  </div>`);
  $tabla2.html(`<div class="table-responsive">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="name">Técnico</th>
                <th scope="col" class="sort" data-sort="completion">Nº órdenes de trabajo</th>
                <th scope="col" class="sort" data-sort="completion">Nº meses de trabajo</th>
                <th scope="col" class="sort" data-sort="completion">Distancia hacia la orden</th>
                <th scope="col" class="sort" data-sort="completion">Tiempo estimado de tareas</th>
                <th scope="col" class="sort" data-sort="status">Elegido mejor opcionado</th>
            </tr>
        </thead>
        <tbody id="res2" class="list">      
           
        </tbody>
    </table>
  </div>`);

  $tabla3.html(`<div id="res3" class="card-body">
  
</div>`);


    let res = document.querySelector('#res');
    res.innerHTML = '';
    let res2 = document.querySelector('#res2');
    res2.innerHTML = '';
    let res3 = document.querySelector('#res3');
    res3.innerHTML = '';

    for(let item of data[0]){
      //console.log(item);
      if (item.distancia == -1) {
        item.distancia = 'Sin ubicaciones'
      }else if(item.distancia == -2){
        item.distancia = 'Pendiente'
      }
      res.innerHTML += ` <tr>
                              <th scope="row">${item.Nombre}</th>
                              <td class="budget">
                                    <div class="progress-wrapper">
                                      <div class="progress-info">
                                        <div class="progress-label">
                                          <span>${item.carga_tra}</span>
                                        </div>
                                        <div class="progress-percentage">
                                          <span>${item.num_ot}</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="${item.num_ot}" aria-valuemin="0" aria-valuemax="100" style="width: ${item.num_ot*5}%;"></div>
                                      </div>
                                    </div>                              
                              </td>
                              <td class="budget">
                              <div class="progress-wrapper">
                                      <div class="progress-info">
                                        <div class="progress-label">
                                          <span>${item.experiencia}</span>
                                        </div>
                                        <div class="progress-percentage">
                                          <span>${item.num_mt}</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="${item.num_mt}" aria-valuemin="0" aria-valuemax="100" style="width: ${item.num_mt*8.333333333333333}%;"></div>
                                      </div>
                                    </div>  
                              </td>
                              <td class="budget">
                              <div class="progress-wrapper">
                                      <div class="progress-info">
                                        <div class="progress-label">
                                          <span>${item.distancia_nivel}</span>
                                        </div>
                                        <div class="progress-percentage">
                                          <span>${item.distancia}</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="${item.distancia}" aria-valuemin="0" aria-valuemax="100" style="width: ${item.distancia*2.5}%;"></div>
                                      </div>
                                    </div>  
                              </td>
                              <td class="budget">
                              <div class="progress-wrapper">
                                      <div class="progress-info">
                                        <div class="progress-label">
                                          <span>${item.tiempo_ots_nivel}</span>
                                        </div>
                                        <div class="progress-percentage">
                                          <span>${item.tiempo_ots}</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="${item.tiempo_ots}" aria-valuemin="0" aria-valuemax="100" style="width: ${item.tiempo_ots*0.25}%;"></div>
                                      </div>
                                    </div>  
                              </td>
                    </tr>` 
      $('#IdEmpleado option[value='+item.id_tecnico+']').prop('selected', true);
      $('#IdEmpleado').selectpicker('refresh');
      $('#btn_Guardar').prop('disabled', false);
    }
    for(let item2 of data[1]){
      //Rellenando datos del modal de detalle del sistema experto
      if (item2.distancia == -1) {
        item2.distancia = 'Sin ubicaciones'
      }else if(item2.distancia == -2){
        item2.distancia = 'Pendiente'
      }
      res2.innerHTML += ` <tr>
                              <th scope="row">${item2.Nombre}</th>
                              <td class="budget">
                                    <div class="progress-wrapper">
                                      <div class="progress-info">
                                        <div class="progress-label">
                                          <span>${item2.carga_tra}</span>
                                        </div>
                                        <div class="progress-percentage">
                                          <span>${item2.num_ot}</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="${item2.num_ot}" aria-valuemin="0" aria-valuemax="100" style="width: ${item2.num_ot*5}%;"></div>
                                      </div>
                                    </div>                              
                              </td>
                              <td class="budget">
                              <div class="progress-wrapper">
                                      <div class="progress-info">
                                        <div class="progress-label">
                                          <span>${item2.experiencia}</span>
                                        </div>
                                        <div class="progress-percentage">
                                          <span>${item2.num_mt}</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="${item2.num_mt}" aria-valuemin="0" aria-valuemax="100" style="width: ${item2.num_mt*8.333333333333333}%;"></div>
                                      </div>
                                    </div>  
                              </td>
                              <td class="budget">
                              <div class="progress-wrapper">
                                      <div class="progress-info">
                                        <div class="progress-label">
                                          <span>${item2.distancia_nivel}</span>
                                        </div>
                                        <div class="progress-percentage">
                                          <span>${item2.distancia}</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="${item2.distancia}" aria-valuemin="0" aria-valuemax="100" style="width: ${item2.distancia*2.5}%;"></div>
                                      </div>
                                    </div>  
                              </td>
                              <td class="budget">
                              <div class="progress-wrapper">
                                      <div class="progress-info">
                                        <div class="progress-label">
                                          <span>${item2.tiempo_ots_nivel}</span>
                                        </div>
                                        <div class="progress-percentage">
                                          <span>${item2.tiempo_ots}</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="${item2.tiempo_ots}" aria-valuemin="0" aria-valuemax="100" style="width: ${item2.tiempo_ots*0.25}%;"></div>
                                      </div>
                                    </div>  
                              </td>
                              <td>
                                <span class="badge badge-dot mr-4">
                                  <i class="bg-info"></i>
                                  <span class="status">${item2.elegido}</span>
                                </span>
                              </td>
                    </tr>` 
    }

    for(let item3 of data[2]){
      //Rellenando datos del modal de detalle del sistema experto
      res3.innerHTML += `<div class="row">
      <div class="col">
        <h5 class="card-title text-uppercase text-muted mb-0">Orden de trabajo tipo ${item3.tipoOrdenTrabajo}</h5>
        <span class="h2 font-weight-bold mb-0">${item3.Daño}: ${item3.Daño_des} - nivel ${item3.nivelOrdenTrabajo} ${item3.tiempo_nivelOT}min.</span>
      </div>
      <div class="col-auto">
        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
          <i class="ni ni-spaceship"></i> 
        </div>
      </div>
    </div>
    
    <h5 class="card-title text-uppercase text-muted mb-0">${item3.Cliente}</h5>
    <p class="mt-3 mb-0 text-sm">
      <span class="text-success mr-2"><i class="fa fa-calendar-day"></i> ${item3.fechaOrdenTrabajo}</span>
      <span class="text-nowrap">${item3.Cliente_direccion}</span>
      <span class="text-primary">${item3.Cliente_telefono }</span>
    </p>` 
    }
    
   window.location.href = "/orden_trabajos/detalle/asesor?data=" + JSON.stringify(data); }

   // window.location.href = `/orden_trabajos/detalle/asesor?data=${data}`; 
  

  function activar_btn_SE(){

    let Ficha = document.getElementById("Ficha");
    let Daño = document.getElementById("ordentrabajoDano");
    var Daño_descrip = document.getElementById("Descripcion");
    var Sistema_E = document.getElementById("btn_SE");
    let Tecnico = document.getElementById("IdEmpleado");

    if ((Ficha.value!=null)&&(Ficha.value!='')&&(Daño.value!=null)&&(Daño.value!='')&&(Daño_descrip.value!=null)&&(Daño_descrip.value!='')) {
      Sistema_E.disabled = false;  
      Tecnico.disabled = false;
      $('.selectpicker').prop('disabled', false);
      $('.selectpicker').selectpicker('refresh');
    } else {
      Sistema_E.disabled = true;  
      Tecnico.disabled = true;
    }
  }
  function activar_btn_Guardar(){

    var Sistema_E = document.getElementById("btn_SE");
    var Guardar = document.getElementById("btn_Guardar");
    let Tecnico = document.getElementById("IdEmpleado");

    if ((Tecnico.value!=null)&&(Tecnico.value!='')&&(Sistema_E.disabled==false)) {
      Guardar.disabled = false;  
    } else {
      Guardar.disabled = true;  
    }
  }