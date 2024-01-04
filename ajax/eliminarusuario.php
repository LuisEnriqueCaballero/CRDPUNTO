<?php
include_once '../config/conexion.php';
$conexion=new conectar();
$con=$conexion->conexion();

$id=$_POST['idusuario'];
$sql="DELETE FROM usuario WHERE DNI='$id'";

echo mysqli_query($con,$sql);
?>