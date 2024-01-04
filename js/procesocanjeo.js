$(document).ready(function(){
    $('#actualizar').click(function(){
        var datos =$('#formulario').serialize();
        // alert(datos);
        // return false;
        $.ajax({
            type:'POST',
            data:datos,
            url:'../../../crdPunto/ajax/procesocanje.php',
            success:function(r){
                if(r==1){
                    window.location='canjeoreclamando.php';
                }else{
                    alertify.error('Hubo un error en el proceso de actualizacion');
                }
            }
        })
    })
})