<?php
session_start();
if (isset($_SESSION['usuario'])) {
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
                    
                    <?php include_once "../temp/sidebar.php" ?>
                    <?php include_once "../temp/menu.php" ?>
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h2 style="text-align:center;">LISTA DE PACIENTE ATENDIDOS</h2>
                            </div>
                            <div class="card-body">
                                <nav class="navbar navbar-light bg-light justify-content-between">

                                    <a class="navbar-brand" href="formularioradiografia.php"><button class="btn btn-outline-info"><span class="fa fa-list"></span><span>Nuevo Servicio</span></button></a>
                                    <!-- <a class="navbar-brand" href="Formulariocanejo.php"><button class="btn btn-outline-info"><span class="fa fa-list"></span><span> CANJEAR MI PUNTOS</span></button></a> -->
                                </nav>
                                <div class="table-responsive" id="tablacliente">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include_once "../temp/finmenu.php" ?>
                    <?php include_once "../temp/libjs.php" ?>
                    <?php include_once "modal/editarservicio.php" ?>
                    <?php include_once "modal/detalleExamen.php" ?>
                    <script>
                        $(document).ready(function(){
                        $('#tablacliente').load('tabla/serviciorealizadoG.php');
                         })
                    </script>
                    <script src='../js/servicioradiografia.js'></script>
                    <script src="../js/verdetalle.js"></script>

    </body>

    </html>
    
<?php
} else {
    header("location:login.php");
}
?>