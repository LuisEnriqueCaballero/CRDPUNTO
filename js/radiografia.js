$(document).ready(function(){
    $("#tablaradiologico").load("tabla/radiografia.php");
    $('#registrar').click(function(){
        dato=$('#formulario').serialize(),
        $.ajax({
            type:'POST',
            data:dato,
            url:'/crdPunto/ajax/radiografia.php',
            success:function(r){
                if(r==1){
                    $('#formulario')[0].reset();
                    $("#tablaradiologico").load("tabla/radiografia.php");
                    alertify.success('LOS DATOS FUERON REGISTRADO CORRECTAMENTE!');
                }else{
                    alertify.error('NO SE PUEDO REGISTRAR CORRECTAMENTE LOS DATOS');
                }
            }
        })
    })
})
function ObtenerDatos(id){
    $.ajax({
        type:'POST',
        data:'id='+id,
        url:'/crdPunto/ajax/Obtenerdatoexamen.php',
        success:function(r){
            dato=jQuery.parseJSON(r);
            $('#idradiologia').val(dato['id_radiografia']);
            $('#radiograficoA').val(dato['tipo_examen']);
            $('#precioU').val(dato['precio']);
            $('#puntogU').val(dato['punto_ganado']);
            $('#puntocA').val(dato['punto_canjeo']);

        }
    })
}
$(document).ready(function(){
    $('#actualizar').click(function(){
        var dato =$('#formularioU').serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'/crdPunto/ajax/ActualizarDatoexamen.php',
            success:function(r){
                if(r==1){
                    $("#tablaradiologico").load("tabla/radiografia.php");
                    alertify.success('LOS DATOS FUERON ACTUALIZADO CORRECTAMENTE!');
                }else{
                    alertify.error('NO SE PUDO HACER EL PROCESO DE ACTUALIZACON'); 
                }
            }
        })
    })
})
function EliminarTipoexamen(id){
    swal({
        title: "Deseas Eliminar este Dato de la tabla registro de rediografia?",
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
            url:'/crdPunto/ajax/eliminarexamen.php',
            success:function(r){
                if(r==1){
                    $("#tablaradiologico").load("tabla/radiografia.php");
                }
            }
          })
        } else {
          swal("El datos no hacido eliminado");
        }
      });   
}