//Registrar nuevo datos en la venta modal
$(document).ready(function(){
    $("#tablaimplante").load("tabla/implante.php");
    $("#registrar").click(function(){
        dato=$("#formulario").serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:"../../../crdPunto/ajax/implante.php",
            success:function(r){
                if(r==1){
                    $("#formulario")[0].reset();
                    $("#tablaimplante").load("tabla/implante.php");
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
//Obtener 
function ObtenerDatos(idimplante){
    $.ajax({
        type:'POST',
        data:'idimplante='+idimplante,
        url:'../../../crdPunto/ajax/ObtenerDatoimplante.php',
        success:function(r){
            dato=jQuery.parseJSON(r);
            $('#idimplante').val(dato['id_implante']);
            $('#marcaA').val(dato['marca_implante']);
            $('#modeloA').val(dato['modelo_implante']);
            $('#cantidadU').val(dato['cantidad']);
            $('#precioU').val(dato['precio']);
            $('#puntogU').val(dato['punto_ganado']);
            $('#puntocU').val(dato['punto_canjeo']);
            $('#descripcionU').val(dato['descripcion']);
        }
    })
}
$(document).ready(function(){
    $('#actualizar').click(function(){
        var dato=$('#formularioU').serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'../../../crdPunto/ajax/ActualizarDatoImplante.php',
            success:function(r){
                if(r==1){
                    $("#tablaimplante").load("tabla/implante.php");
                    alertify.success('LOS DATOS FUERON ACTUALIZADO CORRECTAMENTE!');
                }else{
                    alertify.error('NO SE PUDO HACER EL PROCESO DE ACTUALIZACON');
                }
            }
        })
    })
})
function eliminardatos(id){
    swal({
        title: "Deseas Eliminar este Dato de la tabla registro de Implante?",
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
            url:'../../../crdPunto/ajax/eliminarimplante.php',
            success:function(r){
                if(r==1){
                    $("#tablaimplante").load("tabla/implante.php");
                }
            }
          })
        } else {
          swal("EL DATO NO FUE ELIMINADO EN LA TABLA");
        }
      });  
}
