$(document).ready(function(){
    $("#tablausuario").load("tabla/usuario.php");
    $('#registrar').click(function(){
        if($('#dni').val()==""){
            swal("Debes llenar el campo dni");
            return false;
        }else if($('#nombre').val()==""){
            swal("Debes llenar el campo nombre");
            return false;
        }else if($('#apellido').val()==""){
            swal("Debes llenar el campo apellido");
            return false;
        }else if($('#usuario').val()==""){
            swal("Debes llenar el campo usuario");
            return false;
        }else if($("#password").val()==""){
            swal("Debes llenar el campo password");
            return false;
        }else if($('#empresa').val()=="0"){
            swal("Debes seleccionar una empresa");
            return false;
        }else if($('#roll').val()=="1"){   
        }
        cadena="dni="+$('#dni').val()+
               "&nombre="+$('#nombre').val()+
               "&apellido="+$('#apellido').val()+
               "&usuario="+$('#usuario').val()+
               "&password="+$('#password').val()+
               "&empresa="+$('#empresa').val()+
               "&roll="+$('#roll').val();
        // alert(cadena);
        // return false;
        $.ajax({
            type:'POST',
            data:cadena,
            url:'/crdPunto/ajax/usuario.php',
            success:function(r){
                if(r==2){
                    swal("ESTE USUARIO YA ESTA USADO , ESCRIBA OTRO USUARIO DIFERENTE AL ANTERIOR!", "AS CLICK AL BOTON OK!", "info");
                }
                else if(r==1){
                    $('#formulario')[0].reset();
                    $("#tablausuario").load("tabla/usuario.php");
                    alertify.success('LOS DATOS FUERON REGISTRADO CORRECTAMENTE!');
                }else{
                    alertify.error('NO SE PUEDO REGISTRAR CORRECTAMENTE LOS DATOS');
                }
            }
        })
    })
})
function ObtenerDato(idusuario){
    $.ajax({
        type:'POST',
        data:'idusuario='+idusuario,
        url:'/crdPunto/ajax/ObtenerDatosUsuario.php',
        success:function(r){
            dato=jQuery.parseJSON(r);
            $('#iddocumento').val(dato['DNI']);
            $('#nombreA').val(dato['nombre']);
            $('#usuarioA').val(dato['usuario']);
            $('#passwordA').val(dato['pasword']); 
            $('#empresaA').val(dato['Id_empresa']);  
        }
    })
}
$(document).ready(function(){
    $('#actualizar').click(function(){
        var datos=$('#FormulariA').serialize();
        $.ajax({
            type:'POST',
            data:datos,
            url:'/crdPunto/ajax/ActualizarDatoUsuario.php',
            success:function(r){
               if(r==1){
                $("#tablausuario").load("tabla/usuario.php");
                alertify.success('LOS DATOS FUERON ACTUALIZADO CORRECTAMENTE!');
               }else{
                alertify.error('NO SE PUDO HACER EL PROCESO DE ACTUALIZACON');
               }
            }
        })
    })
})

function eliminarUsuario(idusuario){
    swal({
        title: "Deseas Eliminar este Dato de la tabla registro de usuario?",
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
            data:'idusuario='+idusuario,
            url:'/crdPunto/ajax/eliminarusuario.php',
            success:function(r){
                if(r==1){
                    $("#tablausuario").load("tabla/usuario.php");
                }
            }
          })
        } else {
          swal("El datos no hacido eliminado");
        }
      });
}