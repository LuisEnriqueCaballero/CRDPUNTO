<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();
$id=mysqli_real_escape_string($con,htmlentities($_POST['id']));
$sql="DELETE FROM paciente WHERE Id_documento ='$id'";

echo mysqli_query($con,$sql);
?>