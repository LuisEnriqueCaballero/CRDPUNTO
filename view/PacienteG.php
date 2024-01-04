<?php
include_once '../config/conexion.php';
session_start();
if(isset($_SESSION['usuario'])){
    $conectar=new conectar();
    $con=$conectar->conexion();

    $sql1="SELECT * FROM usuario WHERE usuario='$_SESSION[usuario]'";
    $query=mysqli_query($con,$sql1);
    while($ver=mysqli_fetch_array($query)){
        $usuario=$ver[3];
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once "../temp/libcss.php"; ?>
    <title>Document</title>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                
                <?php include_once "../temp/sidebar.php" ?>
                <?php include_once "../temp/menu.php" ?>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h2 style="text-align:center; font-weight:600; color:#1aa5be">LISTADO DE PACIENTES</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="tablapaciente">

                            </div>
                        </div>
                    </div>
                </div>

                <?php include_once "../temp/finmenu.php" ?>
                <?php include_once "../temp/libjs.php" ?>
                <script src="../js/selectanillado.js"></script>
                <!-- <script src="../js/SelectanilladoA.js"></script> -->
                <script src="../js/pacienteg.js"></script>
                
                // <?php
                // include_once "modal/registarPaciente.php";
                // include_once "modal/editarPaciente.php";
                // include_once "modal/detallePaciente.php";
                // ?>

</body>

</html>

<?php
}else{
    header("location:login.php");
}
?>