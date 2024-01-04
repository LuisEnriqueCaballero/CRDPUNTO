<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();

$id=$_POST['idodontologo'];

$sql="DELETE FROM odontologo WHERE DNI='$id'";

echo mysqli_query($con,$sql);
?>