<?php
session_start();
if(isset($_SESSION['usuario'])){
include_once "modal/registrarEquipo.php";
include_once "modal/editarEquipo.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include "../temp/libcss.php" ?>
    <title>Document</title>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../images/logo.jpg);"></a>
                <?php include_once "../temp/sidebar.php" ?>
                <?php include_once "../temp/menu.php" ?>
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2 style="text-align:center;">LISTA DE EQUIPO</h2>
                        </div>
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light">
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#equiporegistrar">Agregar nuevo <i class="fa fa-product-hunt" aria-hidden="true"></i></button>

                                <form class="form-inline">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar Equipo" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </nav>
                            <div class="table-responsive" id="tablaequipo">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once "../temp/finmenu.php" ?>
                <?php include_once "../temp/libjs.php" ?>
                <script src="../js/calculo.js"></script>
                <script src="../js/equipo.js"></script>
                
</body>
</html>
<?php
}else{
    header("location:login.php");
}
?>