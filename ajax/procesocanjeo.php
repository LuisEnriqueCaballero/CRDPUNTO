<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con =$conectar->conexion();

$radiografia=$_POST['id_radiografia'];
$odontologo=$_POST['id_odontologo'];
$pacinete=$_POST['idPaciente'];
$proceso=$_POST['tipo'];
$mispuntos=$_POST['total'];
$Puntodescuento=$_POST['descuentopunto'];

if($mispuntos <= 10){
   echo 0;
}else{
  echo mysqli_query($con,"INSERT INTO detalle_venta(Id_doctor, Id_paciente, id_radiografia, puntod, tipo)
  VALUE('$odontologo','$pacinete','$radiografia','$Puntodescuento','$proceso')"); 
}
?>