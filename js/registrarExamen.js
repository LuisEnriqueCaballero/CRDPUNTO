function agregarArchivos(){
    var formData=new FormData(document.getElementById('formularioRadio'));
    $.ajax({
        url:'../../../crdPunto/ajax/registrarservicio.php',
        type:'POST',
        datatype:"html",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(respuesta){
        // console.log(respuesta);
        // respuesta = respuesta.trim();         
        if(respuesta == 1){
        window.location="cliente.php";
        }else{
        alertify.error('Hubo un error en el proceso');
            }
        }
    });
}

// $(document).ready(function(){
//     $('#registre').click(function(){
//         
//         // alert(formData);
//         // return false;
//        
//     })
// })