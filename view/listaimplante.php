<?php
session_start();
if (isset($_SESSION['odontologo'])) {
    include_once "../config/conexion.php";
    $conectar = new conectar();
    $con = $conectar->conexion();

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php include "../temp1/libcss.php"; ?>
        <title>Document</title>
    </head>

    <body>
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="p-4 pt-5">
                    
                    <?php include_once "../temp1/sidebar.php" ?>
                    <?php include_once "../temp1/menu.php" ?>
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h2 style="text-align:center;">MI LISTA DE IMPLANTE</h2>
                            </div>
                            <div class="card-body">
                                <nav class="navbar navbar-light bg-light">
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#implanteregistrar"><i class="fa fa-user-plus" aria-hidden="true"></i></button>

                                    <form class="form-inline">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar implante" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </nav>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <th>#</th>
                                            <th>Datos Paciente</th>
                                            <th>Tipo Examen</th>
                                            <th>Punto Ganado</th>
                                            <th>Ver imagen</th>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include_once "../temp1/finmenu.php" ?>
                    <?php include "../temp1/libjs.php" ?>

    </body>

    </html>
<?php
} else {
    header("location:login.php");
}
?>