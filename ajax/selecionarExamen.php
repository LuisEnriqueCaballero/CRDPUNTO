<?php
include_once "../config/conexion.php";
include_once "../class/ObtenerRadiografia.php";

$obtenerDatos=new examenRadiologico();

echo json_encode($obtenerDatos->Obtenerexamen($_POST['id']));
?>