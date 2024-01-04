$(document).ready(function(){
    recargarListaProvincia();
    $('#departamentoA').change(function(){
        recargarListaProvincia();
    })
})
function recargarListaProvincia(){
    $.ajax({
        type:'POST',
        url:"../../../crdPunto/ajax/SelectdepartamentoA.php",
        data:'departamentoA='+$('#departamentoA').val(),
        success:function(r){
            $('#provinciaA').html(r);
        }
    })
}

$(document).ready(function(){
    recargarListaDistrito();
    $('#provinciaA').change(function(){
        recargarListaDistrito();
    })
})
function recargarListaDistrito(){
    $.ajax({
        type:'POST',
        url:'../../../crdPunto/ajax/SelectprovinciaA.php',
        data:'provinciaA='+$('#provinciaA').val(),
        success:function(r){
            $('#distritoA').html(r);
        }
    })
}