<?php
include_once '../config/conexion.php';
$conectar =new conectar();
$con= $conectar->conexion();

$numeroA=mysqli_real_escape_string($con,htmlentities($_POST['numeroA']));
$numeroAD=mysqli_real_escape_string($con,htmlentities($_POST['numeroDA']));
$tipo_documentoA=mysqli_real_escape_string($con,htmlentities($_POST['tipo_documentoA']));
$nombreA=mysqli_real_escape_string($con,htmlentities($_POST['nombreA']));
$apellidoA=mysqli_real_escape_string($con,htmlentities($_POST['apellidoA']));
$fechaA=mysqli_real_escape_string($con,htmlentities($_POST['fechaA']));
$generoA=mysqli_real_escape_string($con,htmlentities($_POST['generoA']));
$telefonoA=mysqli_real_escape_string($con,htmlentities($_POST['telefonoA']));
$departamentoA=mysqli_real_escape_string($con,htmlentities($_POST['departamentoA']));
$provinciaA=mysqli_real_escape_string($con,htmlentities($_POST['provinciaA']));
$distritoA=mysqli_real_escape_string($con,htmlentities($_POST['distritoA']));
$copA=mysqli_real_escape_string($con,htmlentities($_POST['copA']));
$clinicaA=mysqli_real_escape_string($con,htmlentities($_POST['clinicaA']));
$direccionA=mysqli_real_escape_string($con,htmlentities($_POST['direccionA']));
$correoA=mysqli_real_escape_string($con,htmlentities($_POST['correoA']));
$usuarioA=mysqli_real_escape_string($con,htmlentities($_POST['usuarioA']));
$passwordA=mysqli_real_escape_string($con,htmlentities($_POST['passwordA']));

$sql="UPDATE odontologo SET DocumentoI='$numeroAD',Tipo_documento='$tipo_documentoA',nombre='$nombreA',apellido='$apellidoA',fecha='$fechaA',sexo='$generoA',
telefono='$telefonoA',correo_electronico='$correoA', cop='$copA', clinica='$clinicaA', departamento='$departamentoA',
provincia='$provinciaA', distrito='$distritoA', direccion='$direccionA', usuario='$usuarioA', pasword='$passwordA' WHERE DNI='$numeroA'";

echo mysqli_query($con,$sql);
?>