
function Eliminarservicio(id_detalle){
    swal({
        title: "Deseas Eliminar este Dato de la tabla registro de Servicio?",
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
            data:'id_detalle='+id_detalle,
            url:'/crdPunto/ajax/eliminarservicio.php',
            success:function(r){
                if(r==1){
                    $('#tablacliente').load('tabla/serviciorealizado.php');
                }
            }
          })
        } else {
          swal("El datos no hacido eliminado");
        }
      });   
}