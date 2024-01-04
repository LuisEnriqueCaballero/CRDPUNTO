// Registrar datos de paciente
$(document).ready(function(){
    $("#tablapaciente").load("tabla/paciente.php");
    $('#registrarP').click(function(){
        
        if($('#nombre').val()==""){
            swal("Debes llenar el campo nombre");
            return false;
        }else if($('#apellido').val()==""){
            swal("Debes llenar el campo apellido");
            return false;
        }
        var datos=$('#formularioP').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:'/crdPunto/ajax/paciente.php',
            success:function(r){
                // if(r==2){
                //     swal("ESTE NUMERO DE DOCUMENTO YA ESTA REGISTRADO EN NUESTRA BASE DE DATOS!", "AS CLICK AL BOTON OK!", "info");
                // }
                if(r==1){
                    $('#formularioP')[0].reset();
                    $("#tablapaciente").load("tabla/paciente.php");
                    alertify.success('LOS DATOS FUERON REGISTRADO CORRECTAMENTE!');
                }else{
                    alertify.error('NO SE PUEDO REGISTRAR CORRECTAMENTE LOS DATOS');
                }
            }
        })
    })
})
//Detalle del paciente
function Detalle(id){
    $.ajax({
        type:'POST',
        data:'id='+id,
        url:'/crdPunto/ajax/Detallepaciente.php',
        success:function(r){
            $('.modal-body').html(r);
        }
     })
    }
// Obtener datos del Paciente para actualizar
function Obtenerdatos(idpaciente){
    $.ajax({
        type:'POST',
        data:'idpaciente='+idpaciente,
        url:'/crdPunto/ajax/Obtenerdatopaciente.php',
        success:function(r){
          
                dato=jQuery.parseJSON(r);
                $("#numeroA").val(dato['Id_documento']);
                $("#numeroAD").val(dato['DocumentoI']);
                $("#tipo_documentoA").val(dato['Tipo_documento'])
                $("#nombreA").val(dato['nombre']);
                $("#apellidoA").val(dato['apellido']);
                $("#telefonoA").val(dato['telefono']);
                $("#generoA").val(dato['sexo']);
                $("#edadA").val(dato['edad']);
                $('#emailA').val(dato['correo_electronico']);
                $("#departamentoA").val(dato['Departamento']);
                $("#provinciaA").val(dato['provincia']);
                $("#distritoA").val(dato['distrito']);
                $("#direccionA").val(dato['direccion']);
            
        }
    })
}
//Actualizar datos paciente
$(document).ready(function(){
    $("#actualizar").click(function(){
        var dato=$("#formularioU").serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'/crdPunto/ajax/ActualizarDatosPaciente.php',
            success:function(r){
                if(r==1){
                    $("#tablapaciente").load("tabla/paciente.php");
                    alertify.success('LOS DATOS FUERON ACTUALIZADO CORRECTAMENTE!'); 
                }else{
                    alertify.error('NO SE PUDO HACER EL PROCESO DE ACTUALIZACON');
                }
            }
        })
    })
})
//Eliminar datos de la tabla de paciente
function EliminarDatos(id){
    swal({
        title: "Deseas Eliminar este Dato de la tabla registro de Paciente?",
        text: "Si desea eliminar haz click el boton OK, sino desea haz click el boton CANCELAR",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("El dato hacido eliminado del registro", {
            icon: "success",
          });
          $.ajax({
            type:'POST',
            data:'id='+id,
            url:'/crdPunto/ajax/eliminarpaciente.php',
            success:function(r){
                if(r==1){
                    $("#tablapaciente").load("tabla/paciente.php");
                }
            }
          })
        } else {
          swal("El datos no hacido eliminado");
        }
      });   
}



