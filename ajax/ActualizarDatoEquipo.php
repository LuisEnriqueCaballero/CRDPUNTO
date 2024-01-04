<?php
include_once '../config/conexion.php';
$conectar =new conectar();
$con=$conectar->conexion();
$idequipo=$_POST['idequipo'];
$marcaU=$_POST['marcaU'];
$modeloU=$_POST['modeloU'];
$precioU=$_POST['precioU'];
$cantidad=$_POST['cantidadU'];
$puntogU=$_POST['puntogU'];
$puntocU=$_POST['puntocU'];
$descripcionU=$_POST['descripcionU'];
$sql="UPDATE equipo SET marca_equipo='$marcaU', modelo_equipo='$modeloU', precio='$precioU',cantidad='$cantidad', punto_ganado='$puntogU', punto_canjeo='$puntocU', descripcion='$descripcionU' WHERE id_equipo='$idequipo'";
echo mysqli_query($con,$sql);
?>