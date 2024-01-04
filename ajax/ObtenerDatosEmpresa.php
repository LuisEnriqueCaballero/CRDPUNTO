<?php
include_once '../config/conexion.php';
include_once '../class/obtenerdatosEmpresa.php';
$obtener =new Obtener();

echo json_encode($obtener->ObtenerDatos($_POST['idempresa']));
?>