function Detalle(id){
    $.ajax({
        type:'POST',
        data:'id='+id,
        url:"../../../crdPunto/ajax/verdatos.php",
        success:function(response){
            $('.modal-body').html(response);
        }
    })
}