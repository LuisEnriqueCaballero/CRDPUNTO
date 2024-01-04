<?php
include_once('../config/conexion.php');
$conectar=new conectar();
$con =$conectar->conexion();

    $numero=mysqli_real_escape_string($con,htmlentities($_POST['numeroD']));
    $tipo_documento=mysqli_real_escape_string($con,htmlentities($_POST['tipo_documento']));
    $nombre=mysqli_real_escape_string($con,htmlentities($_POST['nombre']));
    $apellido=mysqli_real_escape_string($con,htmlentities($_POST['apellido']));
    $telefono=mysqli_real_escape_string($con,htmlentities($_POST['telefono']));
    $cumpleaño=mysqli_real_escape_string($con,htmlentities($_POST['cumpleaño']));
    $genero=mysqli_real_escape_string($con,htmlentities($_POST['genero']));
    $cop=mysqli_real_escape_string($con,htmlentities($_POST['cop']));
    $clinica=mysqli_real_escape_string($con,htmlentities($_POST['clinica']));
    $departamento=mysqli_real_escape_string($con,htmlentities($_POST['departamento']));
    $provincia=mysqli_real_escape_string($con,htmlentities($_POST['provincia']));
    $distrito=mysqli_real_escape_string($con,htmlentities($_POST['distrito']));
    $direccion=mysqli_real_escape_string($con,htmlentities($_POST['direccion']));
    $correo=mysqli_real_escape_string($con,htmlentities($_POST['correo']));
    $bienvenida=mysqli_real_escape_string($con,htmlentities($_POST['bienvenida']));
    $tipo=mysqli_real_escape_string($con,htmlentities($_POST['tipo']));
    $usuario=mysqli_real_escape_string($con,htmlentities($_POST['usuario']));
    $password=mysqli_real_escape_string($con,htmlentities($_POST['password']));
    $sede=mysqli_real_escape_string($con,htmlentities($_POST['sede']));
    
    
    if(buscarRepetido($usuario,$con) == 1){
      echo 2 ; 
    }else if(buscarCoprepetido($numero,$con)==1){
        echo 3;
    }
    else{
        if(strlen($cop)!=0){
        $bienvenida=50;
         }else{
        $bienvenida=30;
         }
        $sql ="INSERT INTO odontologo (DocumentoI,Tipo_documento,nombre,apellido,fecha,sexo,telefono,correo_electronico,cop,bienvenida,clinica,departamento,provincia,distrito,direccion,usuario,pasword,Id_roll,sede)
        VALUES('$numero','$tipo_documento','$nombre','$apellido','$cumpleaño','$genero','$telefono','$correo','$cop','$bienvenida','$clinica','$departamento','$provincia','$distrito','$direccion','$usuario','$password','$tipo','$sede')";
        echo mysqli_query($con,$sql);
    }


function buscarRepetido($user,$con){
    $sql="SELECT * FROM odontologo WHERE usuario='$user'";
    $resulta=mysqli_query($con,$sql);

    if(mysqli_num_rows($resulta)>0){
        return 1;
    }else{
        return 0;
    }
}

function buscarCoprepetido($copp,$con){
    $sql="SELECT * FROM odontologo WHERE DocumentoI ='$copp'";
    $resulta=mysqli_query($con,$sql);

    if(mysqli_num_rows($resulta)>0){
        return 1;
    }else{
        return 0;
    }
}
?>