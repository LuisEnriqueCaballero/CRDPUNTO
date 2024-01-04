<?php
include_once '../config/conexion.php';
$conectar=new conectar();
$con =$conectar->conexion();

$numero=mysqli_real_escape_string($con,htmlentities($_POST['numeroA']));
$numeroD=mysqli_real_escape_string($con,htmlentities($_POST['numeroAD']));
$tipo_documento=mysqli_real_escape_string($con,htmlentities($_POST['tipo_documentoA']));
$nombre=mysqli_real_escape_string($con,htmlentities($_POST['nombreA']));
$apellido=mysqli_real_escape_string($con,htmlentities($_POST['apellidoA']));
$telefono=mysqli_real_escape_string($con,htmlentities($_POST['telefonoA']));
$genero=mysqli_real_escape_string($con,htmlentities($_POST['generoA']));
$edad=mysqli_real_escape_string($con,htmlentities($_POST['edadA']));
$email=mysqli_real_escape_string($con,htmlentities($_POST['emailA']));
$departamento=mysqli_real_escape_string($con,htmlentities($_POST['departamentoA']));
$provincia=mysqli_real_escape_string($con,htmlentities($_POST['provinciaA']));
$distrito=mysqli_real_escape_string($con,htmlentities($_POST['distritoA']));
$direccion=mysqli_real_escape_string($con,htmlentities($_POST['direccionA']));

$sql="UPDATE paciente SET DocumentoI='$numeroD',Tipo_documento='$tipo_documento',nombre='$nombre',apellido='$apellido',telefono='$telefono',sexo='$genero',edad='$edad',correo_electronico='$email',
                           Departamento='$departamento', provincia='$provincia', distrito='$distrito' , direccion='$direccion' WHERE Id_documento='$numero'";

echo mysqli_query($con,$sql);
?>