<?php
include_once '../config/conexion.php';
$conectar=new conectar();
$con=$conectar->conexion();
$idradiologia=mysqli_real_escape_string($con,htmlentities($_POST['idradiologia']));
$radiograficoA=mysqli_real_escape_string($con,htmlentities($_POST['radiograficoA']));
$precioA=mysqli_real_escape_string($con,htmlentities($_POST['precioU']));
$puntogU=mysqli_real_escape_string($con,htmlentities($_POST['puntogU']));
$puntocA=mysqli_real_escape_string($con,htmlentities($_POST['puntocA']));
$sql="UPDATE radiografia SET tipo_examen='$radiograficoA', precio='$precioA',punto_ganado='$puntogU',punto_canjeo='$puntocA' WHERE id_radiografia ='$idradiologia'";
 echo mysqli_query($con,$sql);
?>