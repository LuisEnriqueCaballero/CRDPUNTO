$(document).ready(function(){
    $('#dni').click(function(){
        $.ajax({
            type:"POST",
            data:"idPaciente="+$('#dni').val(),
            url:"/crdPunto/ajax/buscarPacientes.php",
            success:function(r){
                dato=jQuery.parseJSON(r)
                $('#id_paciente').val(dato['Id_documento']);
                $('#dni').val(dato['DocumentoI']);
                $('#name').val(dato['datos']);
                alertify.success('LOS DATOS FUERON');
                
            }
        })
    })
})