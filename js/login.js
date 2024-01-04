$(document).ready(function(){
    $('#iniciar').click(function(){
        if($('#usuario').val()=="" && $('#password').val()==""){
            swal("Deber llenar todos los campos");
            return false;
        }
        else if($('#usuario').val()==""){
            swal("Deber llenar el campo usuario");
            return false;
        }
        else if($('#password').val()==""){
            swal("Deber llenar el campo contraseña");
            return false;
        }
        
        cadena="usuario="+$('#usuario').val()+ 
               "&password="+$('#password').val();
        $.ajax({
            type:'POST',
            url:'../../crdPunto/ajax/login.php',
            data:cadena,
            success:function(r){
            if(r=='1'){
                    window.location="index.php";
            }else if(r=='2'){
                    window.location="index1.php";    
            }else{
                swal("datos incorrecto!", "Por favor haz click en boton OK!", "error");
                $("#formlogin")[0].reset();
            }
             
            }
        })       
    })
})