<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();

// print_r($_FILES)
if(isset($_POST['registro'])){
$radiografia=mysqli_real_escape_string($con,htmlentities($_POST['id_radiografia']));
$precio=mysqli_real_escape_string($con,htmlentities($_POST['precio']));
$punto=mysqli_real_escape_string($con,htmlentities($_POST['puntog']));
$paciente=mysqli_real_escape_string($con,htmlentities($_POST['idPaciente']));
$odontologo=mysqli_real_escape_string($con,htmlentities($_POST['idOdontologo']));
$pago=mysqli_real_escape_string($con,htmlentities($_POST['pago']));
$link=mysqli_real_escape_string($con,htmlentities($_POST['link']));
$fecha=mysqli_real_escape_string($con,htmlentities($_POST['fecha']));
$usuario=mysqli_real_escape_string($con,htmlentities($_POST['usuario']));
$imagen1=$_FILES['archivo1']['name'];
$imagen2=$_FILES['archivo2']['name'];
$imagen3=$_FILES['archivo3']['name'];
$pdf1=$_FILES['archivo4']['name'];
$guardado=$_FILES['archivo1']['tmp_name'];
$guardado1=$_FILES['archivo2']['tmp_name'];
$guardado2=$_FILES['archivo3']['tmp_name'];
$guardado3=$_FILES['archivo4']['tmp_name'];


$sql="INSERT INTO detalle_venta(Id_doctor,Id_paciente,id_radiografia,precio,punto,tipo,imagen1,imagen2,imagen3,link,usuario,informe,fecha_registro)
VALUES('$odontologo','$paciente','$radiografia','$precio','$punto','$pago','$imagen1','$imagen2','$imagen3','$link','$usuario','$pdf1','$fecha')";
$query1=mysqli_query($con,$sql);
$query=mysqli_query($con,"SELECT max(Id_detalle) as maximo FROM detalle_venta");
    $resultado=mysqli_fetch_array($query);
    $idcarpeta=$resultado['maximo'];
    $carpeta='Archivos/'.$idcarpeta;
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

header('location:../view/cliente.php');

}

?>