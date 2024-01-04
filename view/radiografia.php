<?php
session_start();
if(isset($_SESSION['usuario'])){

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
                            <h2 style="text-align:center; font-weight:700; color:#1aa5be">LISTA DE MIS SERVICIO DE TIPO DE ESTUDIO RADIOLOGICO </h2>
                        </div>
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light">
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#radiologicoRegistrar">Agregar nuevo <i class="fa fa-registered" aria-hidden="true"></i></button>

                            </nav>
                            <div class="table-responsive" id="tablaradiologico">

                            </div>
                        </div>

                    </div>
                </div>

                <?php include_once "../temp/finmenu.php" ?>
                <?php include_once "../temp/libjs.php" ?>
                <script src="../js/calculo.js"></script>
                <script src="../js/radiografia.js"></script>
                <?php
                include_once "modal/registrarExamenRadiografico.php";
                include_once "modal/editarRadiografico.php";
                ?>
</body>

</html>
<?php
}else{
    header("location:login.php");
}
?>