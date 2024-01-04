//Registrar un nuevo odontologo
$(document).ready(function(){
    $("#tablaodontologo").load("tabla/Odontologo.php");
    $('#registrarO').click(function(){
         if($('#nombre').val()==""){
            swal("Debes llenar el campo nombre");
            return false;
        }
        dato=$('#formularioO').serialize(),
        $.ajax({
            type:'POST',
            data:dato,
            url:'/crdPunto/ajax/odontologo.php',
            success:function(r){
                if(r==2){
                    swal("ESTE USUARIO YA ESTA USADO , ESCRIBA OTRO USUARIO DIFERENTE AL ANTERIOR!", "AS CLICK AL BOTON OK!", "info");
                }else if(r==3){
                    swal("EL COP DEL ODONTOLOGO YA EXISTE EN NUESTRA BASE DE DATOS !", "AS CLICK AL BOTON OK!", "info")
                }
               else if(r==1){
                    $('#formularioO')[0].reset();
                    $("#tablaodontologo").load("tabla/Odontologo.php");
                    alertify.success('LOS DATOS FUERON REGISTRADO CORRECTAMENTE!');
                }else{
                    alertify.error('NO SE PUEDO REGISTRAR CORRECTAMENTE LOS DATOS');
                }
            }
        })
    })
})
//Obteniendo datos en la ventana modal del odontologo
function Obtenerdatos(idodontologo){
    $.ajax({
        type:'POST',
        data:'idodontologo='+idodontologo,
        url:'/crdPunto/ajax/ObtenerdatosOdontologo.php',
        success:function(r){
            dato=jQuery.parseJSON(r);
            $('#numeroA').val(dato['DNI']);
            $('#numeroDA').val(dato['DocumentoI']);
            $('#tipo_documentoA').val(dato['Tipo_documento']);
            $('#nombreA').val(dato['nombre']);
            $('#apellidoA').val(dato['apellido']);
            $('#fechaA').val(dato['fecha']);
            $('#generoA').val(dato['sexo']);
            $('#telefonoA').val(dato['telefono']);
            $('#correoA').val(dato['correo_electronico']);
            $('#copA').val(dato['cop']);
            $('#clinicaA').val(dato['clinica']);
            $('#departamentoA').val(dato['departamento']);
            $('#provinciaA').val(dato['provincia']);
            $('#distritoA').val(dato['distrito']);
            $('#direccionA').val(dato['direccion']);
            $('#usuarioA').val(dato['usuario']);
            $('#passwordA').val(dato['pasword']);
            
        }
    })
}
//Editar datos del odontologo
$(document).ready(function(){
    $('#actualizar').click(function(){
        dato=$('#FormulariR').serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'/crdPunto/ajax/ActualizarDatoOdontologo.php',
            success:function(r){
                if(r==1){
                    $("#tablaodontologo").load("tabla/Odontologo.php");
                    alertify.success('LOS DATOS FUERON ACTUALIZADO CORRECTAMENTE!');
                }else{
                    alertify.error('NO SE PUDO HACER EL PROCESO DE ACTUALIZACON');
                }
            }
        })
    })
})
//Eliminar dato de la tabla odontologo
function EliminarDatos(idodontologo){
    swal({
        title: "Deseas Eliminar este Dato de la tabla registro de odontologo?",
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
            data:'idodontologo='+idodontologo,
            url:'/crdPunto/ajax/eliminarodontologo.php',
            success:function(r){
                if(r==1){
                    $("#tablaodontologo").load("tabla/Odontologo.php");
                }
            }
          })
        } else {
          swal("El datos no hacido eliminado");
        }
      });   
}
//Mostrar Informacion del odontologo en la ventana modal
function Detalle(id){
    $.ajax({
        type:'POST',
        data:'id='+id,
        url:'/crdPunto/ajax/DetalleOdontologo.php',
        success:function(r){
            $('.modal-body').html(r);
        }
    })
}

