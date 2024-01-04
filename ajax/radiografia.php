<?php
include_once "../config/conexion.php";
$conectar =new conectar();
$con =$conectar->conexion();
$radiografia=mysqli_real_escape_string($con,htmlentities($_POST['radiografico']));
$precio=mysqli_real_escape_string($con,htmlentities($_POST['precio']));
$puntog=mysqli_real_escape_string($con,htmlentities($_POST['puntog']));
$puntoc=mysqli_real_escape_string($con,htmlentities($_POST['puntoc']));

$sql= "INSERT INTO radiografia (tipo_examen,precio,punto_ganado,punto_canjeo) VALUES('$radiografia','$precio','$puntog','$puntoc')";
echo mysqli_query($con,$sql);
?>