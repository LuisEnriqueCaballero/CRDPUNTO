//Registrar en nuevo equipo en la venta modal
$(document).ready(function(){
    $("#tablaequipo").load("tabla/equipo.php");
    $('#registrar').click(function(){
        var dato=$('#formulario').serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'../../../crdPunto/ajax/equipo.php',
            success:function(r){
                if(r==1){
                    $('#formulario')[0].reset();
                    $("#tablaequipo").load("tabla/equipo.php");
                    alertify.success('LOS DATOS FUERON REGISTRADO CORRECTAMENTE!');
                }else{
                    alertify.error('NO SE PUEDO REGISTRAR CORRECTAMENTE LOS DATOS');
                }
            }
        })
    })
})
//Obtener datos mostrardo en la venta modal ante de actualizar
function obtenerdatos(idempresa){
    $.ajax({
        type:'POST',
        data:"idempresa="+idempresa,
        url:'../../../crdPunto/ajax/Obtenerdatosequipo.php',
        success:function(r){
            dato=jQuery.parseJSON(r);
                $('#idequipo').val(dato['id_equipo']);
                $('#marcaU').val(dato['marca_equipo']);
                $('#modeloU').val(dato['modelo_equipo']);
                $('#precioU').val(dato['precio']);
                $('#puntogU').val(dato['punto_canjeo']);
                $('#puntocU').val(dato['punto_ganado']);
                $('#cantidadU').val(dato['cantidad']);
                $('#descripcionU').val(dato['descripcion']);
        }
    })
}
//Editar datos en la venta modal
$(document).ready(function(){
    $("#tablaequipo").load("tabla/equipo.php");
    $('#actualizar').click(function(){
        var datos=$('#FormulariU').serialize();
        $.ajax({
            type:'POST',
            data:datos,
            url:'../../../crdPunto/ajax/ActualizarDatoEquipo.php',
            success:function(r){
                if(r==1){
                    $("#tablaequipo").load("tabla/equipo.php");
                    alertify.success('LOS DATOS FUERON ACTUALIZADO CORRECTAMENTE!');
                }else{
                    alertify.error('NO SE PUDO HACER EL PROCESO DE ACTUALIZACON');
                }
            }
        })
    })
})
//Eliminar datos
function eliminardato(id){
    swal({
        title: "Deseas Eliminar este Dato de la tabla registro de Equipo?",
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
            url:'../../../crdPunto/ajax/eliminarequipo.php',
            success:function(r){
                if(r==1){
                    $("#tablaequipo").load("tabla/equipo.php");
                }
            }
          })
        } else {
          swal("El datos no hacido eliminado");
        }
      });  
}



