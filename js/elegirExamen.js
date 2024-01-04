function examen(id){
    // alert(id);
    // return false;
    $.ajax({
        type:'POST',
        url:'/crdPunto/ajax/selecionarExamen.php',
        data:'id='+id,
        success:function(r){
            // alert(r);
            // return false;
            dato=jQuery.parseJSON(r);
            
               $('#id_radiografia').val(dato['id_radiografia']);
               $('#radiografia').val(dato['tipo_examen']);
               $('#precio').val(dato['precio']);
               $('#puntog').val(dato['punto_ganado']);
               alertify.success('El examen fue seleccionado');
        }
    })
}