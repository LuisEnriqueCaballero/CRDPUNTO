<?php
include_once "../config/conexion.php";
$conectar =new conectar();
$con=$conectar->conexion();
$empresa =mysqli_real_escape_string($con,htmlentities($_POST['empresa']));
$descripcion =mysqli_real_escape_string($con,htmlentities($_POST['descripcion']));

    $sql="INSERT INTO empresa (nombre,descripcion) VALUES('$empresa','$descripcion')";
    echo mysqli_query($con,$sql);

?>