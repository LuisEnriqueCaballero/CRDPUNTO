<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();
    $marca=mysqli_real_escape_string($con,htmlentities($_POST['marca']));
    $modelo=mysqli_real_escape_string($con,htmlentities($_POST['modelo']));
    $precio=mysqli_real_escape_string($con,htmlentities($_POST['precio']));
    $cantidad=mysqli_real_escape_string($con,htmlentities($_POST['cantidad']));
    $punto=mysqli_real_escape_string($con,htmlentities($_POST['puntog']));
    $puntoc=mysqli_real_escape_string($con,htmlentities($_POST['puntoc']));
    $descripcion=mysqli_real_escape_string($con,htmlentities($_POST['descripcion']));
    
    $sql="INSERT INTO equipo(marca_equipo,modelo_equipo,precio,cantidad,descripcion,punto_canjeo,punto_ganado)
     VALUE('$marca','$modelo','$precio','$cantidad','$descripcion','$punto','$puntoc')";

  echo mysqli_query($con,$sql);
?>