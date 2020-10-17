let $dano, $fecha;
$(function () {
    $ficha = $('#Ficha');
    $dano = $('#ordentrabajoDano');
    $fecha = $('#date');
    

    $ficha.change(() => {
      const fichaId = $ficha.val();
      const url = `/orden_trabajos/${fichaId}/ficha`;
      $.getJSON(url, onClienteLoaded);
    });
    $dano.change(onTecnicosLoaded);
    $fecha.change(onTecnicosLoaded);
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
    onTecnicosLoaded();
  }
  function onTecnicosLoaded() {
    const selectedDano = $dano.val();
    const selectedFecha = $fecha.val();
    const fichaId = $ficha.val();
    const url = `/orden_trabajos/tecnico/se?ficha=${fichaId}&dano=${selectedDano}&date=${selectedFecha}`;
    $.getJSON(url, displayTecnicos);
  }
  function displayTecnicos(data) {
    console.log(data);
  }

  function activar_btn_SE(){

    let Ficha = document.getElementById("Ficha");
    let Daño = document.getElementById("ordentrabajoDano");
    var Sistema_E = document.getElementById("btn_SE");
    let Tecnico = document.getElementById("IdEmpleado");

    if ((Ficha.value!=null)&&(Ficha.value!='')&&(Daño.value!=null)&&(Daño.value!='')) {
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