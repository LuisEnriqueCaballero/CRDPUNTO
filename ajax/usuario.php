<?php
include_once '../config/conexion.php';
$conectar=new conectar();
$con=$conectar->conexion();
$dni=mysqli_real_escape_string($con,htmlentities($_POST['dni']));
$nombre=mysqli_real_escape_string($con,htmlentities($_POST['nombre']));
$apellido=mysqli_real_escape_string($con,htmlentities($_POST['apellido']));
$usuario=mysqli_real_escape_string($con,htmlentities($_POST['usuario']));
$password=mysqli_real_escape_string($con,htmlentities($_POST['password']));
$empresa=mysqli_real_escape_string($con,htmlentities($_POST['empresa']));
$roll=mysqli_real_escape_string($con,htmlentities($_POST['roll']));

if(buscarRepetido($usuario,$password,$con) == 1){
    echo 2;
}else{
    $sql="INSERT INTO usuario (DNI,nombre,apellido,usuario,pasword,Id_empresa,Id_roll) VALUES('$dni','$nombre','$apellido','$usuario','$password','$empresa','$roll')";
    echo mysqli_query($con,$sql);
}

function buscarRepetido($user,$pass,$con){
    $sql="SELECT * FROM usuario WHERE usuario='$user' AND pasword='$pass'";
    $resulta=mysqli_query($con,$sql);

    if(mysqli_num_rows($resulta)>0){
        return 1;
    }else{
        return 0;
    }
}
?>