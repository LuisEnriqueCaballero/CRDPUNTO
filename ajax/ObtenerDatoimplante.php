<?php
include_once "../config/conexion.php";
include_once "../class/ObtenerDatoimplante.php";
$implante=new implante();

echo json_encode($implante->obtenerdatos($_POST['idimplante']));
?>