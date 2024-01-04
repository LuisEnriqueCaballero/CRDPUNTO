<?php
include_once "../config/conexion.php";
$conectar =new conectar();
$con =$conectar->conexion();

$id=mysqli_real_escape_string($con,htmlentities($_POST['id']));
$sql="DELETE FROM radiografia WHERE id_radiografia ='$id'";

echo mysqli_query($con,$sql);
?>