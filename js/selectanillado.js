$(document).ready(function(){
    recargarListaProvincia();
    $('#departamento').change(function(){
        recargarListaProvincia();
    })
})
function recargarListaProvincia(){
    $.ajax({
        type:'POST',
        url:"../../../crdPunto/ajax/Selectdepartamento.php",
        data:'departamento='+$('#departamento').val(),
        success:function(r){
            $('#provincia').html(r);
        }
    })
}

$(document).ready(function(){
    recargarListaDistrito();
    $('#provincia').change(function(){
        recargarListaDistrito();
    })
})
function recargarListaDistrito(){
    $.ajax({
        type:'POST',
        url:'../../../crdPunto/ajax/Selectprovincia.php',
        data:'provincia='+$('#provincia').val(),
        success:function(r){
            $('#distrito').html(r);
        }
    })
}