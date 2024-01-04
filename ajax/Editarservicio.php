<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();

$id=$_REQUEST['id'];

if(isset($_POST['Aregistro'])){
$radiografia=mysqli_real_escape_string($con,htmlentities($_POST['id_radiografia']));
$precio=mysqli_real_escape_string($con,htmlentities($_POST['precio']));
$punto=mysqli_real_escape_string($con,htmlentities($_POST['puntog']));
$paciente=mysqli_real_escape_string($con,htmlentities($_POST['idPaciente']));
$odontologo=mysqli_real_escape_string($con,htmlentities($_POST['idOdontologo']));
$link=mysqli_real_escape_string($con,htmlentities($_POST['link']));
$fecha=$_POST['fecha'];
$sql="UPDATE detalle_venta SET Id_doctor='$odontologo',Id_paciente='$paciente',link='$link', fecha_registro='$fecha',informe='$pdf1' WHERE Id_detalle='$id'";
$query=mysqli_query($con,$sql);
header('location:../view/cliente.php');
}
?>