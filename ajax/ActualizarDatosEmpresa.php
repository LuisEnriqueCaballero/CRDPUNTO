<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();
$idempresa=mysqli_real_escape_string($con,htmlentities($_POST['idempresa']));
$empresaA=mysqli_real_escape_string($con,htmlentities($_POST['empresaA']));
$descripcionA=mysqli_real_escape_string($con,htmlentities($_POST['descripcionA']));

$sql="UPDATE empresa SET nombre='$empresaA', descripcion='$descripcionA' WHERE id_empresa='$idempresa'";

echo mysqli_query($con,$sql);
?>