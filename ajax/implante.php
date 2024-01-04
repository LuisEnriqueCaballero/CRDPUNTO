<?php
include_once "../config/conexion.php";
$conexion=new conectar();
$con=$conexion->conexion();

    $marca=$_POST['marca'];
    $modelo=$_POST['modelo'];
    $precio=$_POST['precio'];
    $cantidad=$_POST['cantidad'];
    $puntog=$_POST['puntog'];
    $puntoc=$_POST['puntoc'];
    $descripcion=$_POST['descripcion'];
$sql="INSERT INTO implante(marca_implante,modelo_implante,precio,cantidad,punto_ganado,punto_canjeo,descripcion) 
VALUE('$marca','$modelo','$precio','$cantidad','$puntog','$puntoc','$descripcion')";
echo mysqli_query($con,$sql);
?>