<?php
include_once '../config/conexion.php';
$conectar=new conectar();
$con=$conectar->conexion();

$dni=mysqli_real_escape_string($con,htmlentities($_POST['iddocumento']));
$nombre=mysqli_real_escape_string($con,htmlentities($_POST['nombreA']));
$Usuario=mysqli_real_escape_string($con,htmlentities($_POST['usuarioA']));
$empresa=mysqli_real_escape_string($con,htmlentities($_POST['empresaA']));
$roll=mysqli_real_escape_string($con,htmlentities($_POST['roll']));

$sql ="UPDATE  usuario SET nombre='$nombre',usuario='$Usuario',Id_empresa='$empresa',
Id_roll='$roll' WHERE DNI='$dni'";
echo mysqli_query($con,$sql);
?>