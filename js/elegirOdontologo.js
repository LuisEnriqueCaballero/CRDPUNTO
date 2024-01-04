function elegir(id){
    // alert(id);
    // return false;
    $.ajax({
        type:'POST',
        url:'/crdPunto/ajax/selecionar.php',
        data:'id='+id,
        success:function(r){
            dato=jQuery.parseJSON(r);
               $('#idOdontologo').val(dato['DNI']);
               $('#dni_odontologo').val(dato['DocumentoI']);
               $('#name_odontologo').val(dato['datoOdontologo']);
               alertify.success('Seleccionaste al odontologo correctamente');
        }
    })
}