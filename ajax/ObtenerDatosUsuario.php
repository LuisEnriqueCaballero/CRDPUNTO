<?php
include_once '../config/conexion.php';
include_once '../class/ObtenerDatosUsuario.php';

$obtener=new usuario();

echo json_encode($obtener->obtenerdatousuario($_POST['idusuario']));
?>