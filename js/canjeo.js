$(document).ready(function(){
    $('#canjear').click(function(){
        var datos=$('#formulario1').serialize();
        // alert(datos);
        // return false;
        $.ajax({
            type:'POST',
            url:"../../../crdPunto/ajax/procesocanjeo.php",
            data:datos,
            success:function(r){
                if(r==1){
                    window.location='canjearexamen.php';
                    alertify.success('Tu proceso de canjeo fue exitosa'); 
                }else{
                    swal("SU PROCESO DE CANJEO SU INCORRECTO, POR FALTA DE PUNTOS!", "HAS CLICK AL BOTON OK, PARA CONTINUAR!", "error");    
                   
                }
            }
        })
    })
})