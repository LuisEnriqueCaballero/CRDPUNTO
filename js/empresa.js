//Registrar una nueva empresa en la venta modal
$("#tablaempresa").load("tabla/empresa.php");
$(document).ready(function(){
    $('#registrar').click(function(){
        
        var dato=$('#formulario').serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'/crdPunto/ajax/empresa.php',
            success:function(r){
                if(r==1){
                    $('#formulario')[0].reset();
                    $("#tablaempresa").load("tabla/empresa.php");
                    alertify.success('LOS DATOS FUERON REGISTRADO CORRECTAMENTE!');
                    // swal("SE REGISTRO CORRECTAMENTE!", "AS CLICK AL BOTON OK!", "success");
                }else{
                    alertify.error('NO SE PUEDO REGISTRAR CORRECTAMENTE LOS DATOS');
                    // swal("NO SE PUEDO REGISTRAR CORRECTAMENTE!", "AS CLICK AL BOTON OK!", "error");
                }
            }
        })
    })
})
//Obteniendo datos de la empresa en la ventana modal ante de actualizar
function ObtenerDatos(idempresa){
    $.ajax({
        type:"POST",
        data:'idempresa='+idempresa,
        url:'/crdPunto/ajax/ObtenerDatosEmpresa.php',
        success:function(r){
            dato=jQuery.parseJSON(r);
            $('#idempresa').val(dato['id_empresa']);
            $('#empresaA').val(dato['nombre']);
            $('#descripcionA').val(dato['descripcion']);
        }
    })
    
 }
 //Editar datos en la ventana modal
 $(document).ready(function(){
    $("#tablaempresa").load("tabla/empresa.php");
    $("#actualizar").click(function(){
        var dato=$("#formularioU").serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'/crdPunto/ajax/ActualizarDatosEmpresa.php',
            success:function(r){
                if(r==1){
                    $("#tablaempresa").load("tabla/empresa.php");
                    alertify.success('LOS DATOS FUERON ACTUALIZADO CORRECTAMENTE!');
                    // swal("SE ACTUALIZO CORRECTAMENTE!", "AS CLICK AL BOTON OK!", "success");
                }else{
                    alertify.error('NO SE PUDO HACER EL PROCESO DE ACTUALIZACON');
                    // swal("NO SE PUEDO ACTUALIZAR!", "AS CLICK AL BOTON OK!", "error");
                }
            }
        })
    })
 })
 //Eliminar datos en la tabla de empresa 
function EliminarDatos(id){
    swal({
        title: "Deseas Eliminar este Dato de la tabla registro empresa?",
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
            url:'/crdPunto/ajax/eliminarempresa.php',
            success:function(r){
                if(r==1){
                    $("#tablaempresa").load("tabla/empresa.php");
                }
            }
          })
        } else {
          swal("El datos no hacido eliminado");
        }
      });   
}


