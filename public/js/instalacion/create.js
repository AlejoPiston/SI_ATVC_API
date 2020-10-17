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