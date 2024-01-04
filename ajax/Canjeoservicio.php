<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();

$id=$_REQUEST['id'];

if(isset($_POST['canjear'])){
// $radiografia=mysqli_real_escape_string($con,htmlentities($_POST['id_radiografia']));
// $precio=mysqli_real_escape_string($con,htmlentities($_POST['precio']));
// $punto=mysqli_real_escape_string($con,htmlentities($_POST['puntog']));
// $paciente=mysqli_real_escape_string($con,htmlentities($_POST['idPaciente']));
// $odontologo=mysqli_real_escape_string($con,htmlentities($_POST['idOdontologo']));
// $pago=mysqli_real_escape_string($con,htmlentities($_POST['pago']));
$usuario=$_POST['usuario'];
$proceso=$_POST['proceso'];
$link=$_POST['link'];
$fecha=$_POST['fecha'];
$imagen1=$_FILES['archivo1']['name'];
$imagen2=$_FILES['archivo2']['name'];
$imagen3=$_FILES['archivo3']['name'];
$pdf1=$_FILES['archivo4']['name'];
$guardado=$_FILES['archivo1']['tmp_name'];
$guardado1=$_FILES['archivo2']['tmp_name'];
$guardado2=$_FILES['archivo3']['tmp_name'];
$guardado3=$_FILES['archivo4']['tmp_name'];


$carpeta='Archivos/'.$id;
if(!file_exists($carpeta)){
    mkdir($carpeta,0777,true);
    if(file_exists('Archivos')){
        move_uploaded_file($guardado,$carpeta.'/'.$imagen1);
        move_uploaded_file($guardado1,$carpeta.'/'.$imagen2);
        move_uploaded_file($guardado2,$carpeta.'/'.$imagen3);
        move_uploaded_file($guardado3,$carpeta.'/'.$pdf1);
    }
}else{
        move_uploaded_file($guardado,$carpeta.'/'.$imagen1);
        move_uploaded_file($guardado1,$carpeta.'/'.$imagen2);
        move_uploaded_file($guardado2,$carpeta.'/'.$imagen3);
        move_uploaded_file($guardado3,$carpeta.'/'.$pdf1);
    }

$sql="UPDATE detalle_venta SET  Usuario='$usuario', tipo='$proceso', imagen1='$imagen1', imagen2='$imagen2', imagen3='$imagen3', link='$link', fecha_registro='$fecha', informe='$pdf1' WHERE Id_detalle='$id'";

$query=mysqli_query($con,$sql);

header('location:../view/canjeoreclamando.php');
}
?>