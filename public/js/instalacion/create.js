function activar_btn_Ubicacion(){
    var NombreCliente = document.getElementById("NombreCliente");
    var Telefono = document.getElementById("Telefono");
    var Direccion2 = document.getElementById("Direccion2");
    var Referencia2 = document.getElementById("Referencia2");          

    var Ubicacion = document.getElementById("btn_Ubicacion");


    if ((NombreCliente.value!=null)&&(NombreCliente.value!='')&&(Telefono.value!=null)&&(Telefono.value!='')) {
      Ubicacion.disabled = false;  
    } else {
      Ubicacion.disabled = true;  
    }
    
    var Seleccionar = document.getElementById("btn_Seleccionar");
          if ((Direccion2.value!=null)&&(Direccion2.value!='')&&(Referencia2.value!=null)&&(Referencia2.value!='')) {
            Seleccionar.disabled = false;
          } else {
            Seleccionar.disabled = true;
          }

  }
  
  $(document).ready(function(){
      $('#btn_Seleccionar').click(function(){
          var referencia = $("#modal-default #Referencia2").val().trim();
          var ciudad = $("#modal-default #Direccion2").val().trim();
          var latitud = $("#modal-default #txtLat").val().trim();
          var longitud = $("#modal-default #txtLng").val().trim();

         
          $('#Direccion1').val(ciudad);
          $('#Referencia1').val(referencia);

          var Direccion = document.getElementById("Direccion1");
          var Referencia = document.getElementById("Referencia1"); 

          
          var Direccion_ = document.getElementById("Direccion");
          var Referencia_ = document.getElementById("Referencia"); 

          var Sistema_E = document.getElementById("btn_SE");
          let Tecnico = document.getElementById("IdEmpleado");

          if ((Direccion.value!=null)&&(Direccion.value!='')&&(Referencia.value!=null)&&(Referencia.value!='')) {
            Sistema_E.disabled = false;
            Tecnico.disabled = false;
            $('.selectpicker').prop('disabled', false);
            $('.selectpicker').selectpicker('refresh');
            Direccion_.value = Direccion.value;
            Referencia_.value = Referencia.value;

            $('#Latitud').val(latitud);
            $('#Longitud').val(longitud);

            


          } else {
            Sistema_E.disabled = true;   
            Tecnico.disabled = true;
          }



      });
  });

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

  function onTecnicosLoaded() {
    let $fecha;
    $fecha = $('#date');
    $lat = $('#Latitud');
    $lon = $('#Longitud');
    const selectedFecha = $fecha.val();
    const instalacion_lati = $lat.val();
    const instalacion_long = $lon.val();
    const url = `/orden_trabajos/tecnico/se?Latitud=${instalacion_lati}&Longitu=${instalacion_long}&date=${selectedFecha}`;
    $.getJSON(url, displayTecnicos);
  }
  function displayTecnicos(data) {
    $optimos = $('#optimos');
    $tabla = $('#tabla');

    //console.log(data);
    $optimos.html(`<div class="alert alert-success" role="alert">
    <strong>Los mejores opcionados</strong></div>`);
    $tabla.html(`<div class="table-responsive">
    <table class="table align-items-center table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="sort" data-sort="name">Técnico</th>
                <th scope="col" class="sort" data-sort="budget">Nº órdenes de trabajo</th>
                <th scope="col" class="sort" data-sort="status">Nº meses de trabajo</th>
                <th scope="col">Distancia hacia la orden</th>
                <th scope="col" class="sort" data-sort="completion">Tiempo estimado de tareas</th>
            </tr>
        </thead>
        <tbody id="res" class="list">      
           
        </tbody>
    </table>
  </div>`);

    let res = document.querySelector('#res');
    res.innerHTML = '';

    for(let item of data){
      //console.log(item);
      if (item.distancia == -1) {
        item.distancia = 'Sin ubicaciones'
      }else if(item.distancia == -2){
        item.distancia = 'Pendiente'
      }
      res.innerHTML += ` <tr>
                              <th scope="row">${item.Nombre}</th>
                              <td class="budget">${item.num_ot}</td>
                              <td class="budget">${item.num_mt}</td>
                              <td class="budget">${item.distancia}</td>
                              <td class="budget">${item.tiempo_ots}</td>
                    </tr>` 
      $('#IdEmpleado option[value='+item.id_tecnico+']').prop('selected', true);
      $('#IdEmpleado').selectpicker('refresh');
      $('#btn_Guardar').prop('disabled', false);
    }
  } 