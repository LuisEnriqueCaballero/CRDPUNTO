<?php
include_once '../config/conexion.php';
$conectar=new conectar();
$con=$conectar->conexion();

$idimplante=$_POST['idimplante'];
$marcaA=$_POST['marcaA'];
$modeloA=$_POST['modeloA'];
$cantidadU=$_POST['cantidadU'];
$precioU=$_POST['precioU'];
$puntogU=$_POST['puntogU'];
$puntocU=$_POST['puntocU'];
$descripcionU=$_POST['descripcionU'];

$sql="UPDATE implante SET marca_implante='$marcaA',modelo_implante='$modeloA',precio='$precioU',cantidad='$cantidadU',punto_ganado='$puntogU',
punto_canjeo='$puntocU',descripcion='$descripcionU'  WHERE id_implante='$idimplante'";
echo mysqli_query($con,$sql);
?>