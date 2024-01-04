function seleccionar(id){
    // alert(id);
    // return false;
    $.ajax({
        type:'POST',
        url:'/crdPunto/ajax/selecionarP.php',
        data:'id='+id,
        success:function(r){
            // alert(r);
            // return false;
            dato=jQuery.parseJSON(r);
               $('#idPaciente').val(dato['Id_documento']);
               $('#dni').val(dato['DocumentoI']);
               $('#name').val(dato['datopaciente']);
               alertify.success('El paciente fue seleccionado');
        }
    })
}