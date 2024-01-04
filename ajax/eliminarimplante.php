<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con =$conectar->conexion();
$id=$_POST['id'];
$sql="DELETE FROM implante WHERE id_implante='$id'";

echo mysqli_query($con,$sql);
?>