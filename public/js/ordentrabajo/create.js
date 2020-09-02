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
    $('#nombresFicha').html(client.Nombres+' '+client.Apellidos);
    $('#cedulaFicha').html(client.CedulaRuc);
    $('#cuotaFicha').html('$'+client.ValorMensual);
    $('#zonaFicha').html(client.zonaficha.Nombre);
    if (client.Estado == 1) {
      $('#estadoFicha').html("✓");
    } else {
      $('#estadoFicha').html("✗");
    }
    $('#servicioFicha').html(client.servicioficha.Nombre);
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