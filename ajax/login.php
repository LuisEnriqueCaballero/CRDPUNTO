<?php
session_start();
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();
$usuario=mysqli_real_escape_string($con,htmlentities($_POST['usuario']));
$password=mysqli_real_escape_string($con,htmlentities($_POST['password']));


// $sql="SELECT usuario,pasword,Id_roll FROM usuario UNION DISTINCT SELECT usuario, pasword,Id_roll FROM odontologo 
// WHERE usuario='$usuario' AND pasword='$password'";
// $sql="SELECT usuario,pasword,Id_roll FROM usuario WHERE usuario='$usuario' AND pasword='$password'";
if(mysqli_num_rows(mysqli_query($con,"SELECT usuario,pasword,Id_roll FROM usuario WHERE usuario='$usuario' AND pasword='$password' AND Id_roll=1"))>0){
    $_SESSION['usuario']=$usuario;
    echo 1;
}else if(mysqli_num_rows(mysqli_query($con,"SELECT usuario,pasword,Id_roll FROM odontologo WHERE usuario='$usuario' AND pasword='$password' AND Id_roll=2"))>0){
    $_SESSION['odontologo']=$usuario;
    echo 2;
}else{
    echo 0;
}

//  $query;
// $ver=mysqli_fetch_all($query);
// if($ver['Id_roll']==1){
//     $_SESSION['usuario']=$usuario;
//     echo 1;
// }
// $sql1="SELECT usuario, pasword,Id_roll FROM odontologo  WHERE usuario='$usuario' AND pasword='$password'";
// $query1=mysqli_query($con,$sql1);
// $ver1=mysqli_fetch_all($query1);
// if($ver1['Id_roll']==2){
//     $_SESSION['odontologo']=$usuario;
//     echo 2;
// }
// else{
//     echo 0;
// }
?>
