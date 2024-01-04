<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();
$numero=mysqli_real_escape_string($con,htmlentities($_POST['numeroD']));
$tipo_documento=mysqli_real_escape_string($con,htmlentities($_POST['tipo_documento']));
$nombre=mysqli_real_escape_string($con,htmlentities($_POST['nombre']));
$apellido=mysqli_real_escape_string($con,htmlentities($_POST['apellido']));
$telefono=mysqli_real_escape_string($con,htmlentities($_POST['telefono']));
$genero=mysqli_real_escape_string($con,htmlentities($_POST['genero']));
$edad=mysqli_real_escape_string($con,htmlentities($_POST['edad']));
$email=mysqli_real_escape_string($con,htmlentities($_POST['email']));
$departamento=mysqli_real_escape_string($con,htmlentities($_POST['departamento']));
$provincia=mysqli_real_escape_string($con,htmlentities($_POST['provincia']));
$distrito=mysqli_real_escape_string($con,htmlentities($_POST['distrito']));
$direccion=mysqli_real_escape_string($con,htmlentities($_POST['direccion']));
$sede=mysqli_real_escape_string($con,htmlentities($_POST['sede']));

// if(buscarrepetido($numero,$con) == 1){
//     echo 2;
// }else{
   $sql ="INSERT INTO paciente(DocumentoI,Tipo_documento,nombre,apellido,telefono,sexo,edad,correo_electronico,Departamento,provincia,distrito,direccion,sede)
   VALUES('$numero',$tipo_documento,'$nombre','$apellido','$telefono','$genero','$edad','$email','$departamento','$provincia','$distrito','$direccion','$sede')";
   echo mysqli_query($con,$sql); 
// }

// function buscarrepetido($documento,$con){
//     $sql1="SELECT * FROM paciente WHERE DocumentoI ='$documento'";
//     $resulta=mysqli_query($con,$sql1);

//     if(mysqli_num_rows($resulta)>0){
//         return 1;
//     }else{
//         return 0;
//     }
// }
?>