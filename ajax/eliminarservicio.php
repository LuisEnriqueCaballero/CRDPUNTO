<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();

$id=mysqli_real_escape_string($con,htmlentities($_POST['id_detalle']));
$sql ="DELETE FROM detalle_venta WHERE Id_detalle='$id'";
echo mysqli_query($con,$sql);
?>