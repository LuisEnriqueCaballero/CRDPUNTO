<?php
session_start();
include_once "../config/conexion.php";
if (isset($_SESSION['usuario'])) {
    $conectar = new conectar();
    $con = $conectar->conexion();
    $query1 = mysqli_query($con, "SELECT * FROM usuario WHERE usuario='$_SESSION[usuario]'");
    while ($ver1 = mysqli_fetch_array($query1)) {
        $nombre = $ver1[3];
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
                        <form method="POST" action="../ajax/registrarservicio.php" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h2 class="title" style="font-weight:bolder; color:#119FD4">REALIZAR UN EXAMEN DE RADIOGRAFIA</h2>
                                </div>
                                <div class="card-body">
                                    <h5>Selecciona a tu Paciente</h5>
                                    <hr>
                                    <div class="form-row justify-content-around">
                                        <div hidden>
                                            <input type="text" name="idPaciente" id="idPaciente">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Numero de Identidad</label>
                                            <input type="text" name="dni" id="dni" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Paciente</label>
                                            <input type="text" name="name" id="name" class="form-control" readonly autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Seleccionar al Paciente</label>

                                            <button type="button" name="buscar" id="buscar" class="form-control btn btn-success" data-toggle="modal" data-target="#listaPaciente"><span class="fa fa-search" aria-hidden="true"> Haz Click aqui!</span></button>
                                        </div>
                                    </div>
                                    <h5>Selecciona a tu Odontologo</h5>
                                    <hr>
                                    <div class="form-row justify-content-around">
                                        <div hidden>
                                            <input type="text" name="idOdontologo" id="idOdontologo">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Numero de Identidad</label>
                                            <input type="text" name="dni_odontologo" id="dni_odontologo" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Odontologo</label>
                                            <input type="text" name="name_odontologo" id="name_odontologo" class="form-control" readonly autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Seleccionar al Odontologo</label>
                                            <button type="button" name="buscar" id="buscar" class="form-control btn btn-dark" data-toggle="modal" data-target="#registroOdontologo"><span class="fa fa-search" aria-hidden="true"> Haz Click aqui!</span></button>
                                        </div>
                                        <input type="text" hidden name="pago" id="pago" value="CANCELADO">
                                        <input type="text" name="usuario" hidden id="usuario" value="<?php echo $nombre ?>">
                                    </div>
                                    <h5>Datos del Examen Radiografico</h5>
                                    <hr>
                                    <div hidden>
                                        <label for="">id_radiografia</label>
                                        <input type="text" name="id_radiografia" id="id_radiografia">
                                    </div>
                                    <div class="form-row justify-content-around">

                                        <div class="form-group col-md-3">
                                            <label for="">Selecciona un servicio</label>
                                            <button type="button" name="buscar" id="buscar" class="form-control btn btn-secondary" data-toggle="modal" data-target="#listaexamen"><span class="fa fa-search" aria-hidden="true"> Haz click aqui!</span></button>
                                        </div>
                                        <!--<div class="form-group col-md-3">-->
                                        <!--<label for="">Elige una promocion servicio</label>-->
                                        <!--<button type="button" name="buscar" id="buscar" class="form-control btn btn-success"data-toggle="modal" data-target="#listaPaciente"><span class="fa fa-search" aria-hidden="true"> BUSCAR</span></button>-->
                                        <!--</div>-->

                                        <div class="form-group col-md-4">
                                            <label for="">Descripcion del examen radiografico</label>
                                            <input type="text" class="form-control" name="radiografia" id="radiografia" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Precio</label>
                                            <input type="text" class="form-control" name="precio" id="precio" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Punto ganado</label>
                                            <input type="text" class="form-control" name="puntog" id="puntog" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" readonly>
                                        </div>

                                    </div>
                                    <h5>Subir Imagenes</h5>
                                    <hr>
                                    <div class="form-row justify-content-around">
                                        <div class="form-group col-md-3">
                                            <label for="">Seleccionar una imagen</label>
                                            <input type="file" class="form-control" name="archivo1" id="archivo1" accept=".jpg, .png*">

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Seleccionar una imagen</label>
                                            <input type="file" class="form-control" name="archivo2" id="archivo2" accept=".jpg, .png*">

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Seleccionar una imagen</label>
                                            <input type="file" class="form-control" name="archivo3" id="archivo3" accept=".jpg, .png*">
                                        </div>
                                    </div>
                                    <h5>Subir tu informe</h5>
                                    <hr>
                                    <div class="form-row justify-content-around">
                                        <div class="form-group col-md-4">
                                            <label for="">Subir archivo</label>
                                            <input type="file" class="form-control" name="archivo4" id="archivo4" accept="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Copiar Link</label>
                                            <input type="text" class="form-control" name="link" id="link">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">fecha del examen</label>
                                            <input type="date" class="form-control" name="fecha" id="fecha" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="form-row">
                                        <div class="col-6">
                                            <button type="submit" name="registro" id="registro" class="btn btn-outline-info btn-lg">Registro</button>
                                        </div>
                                        <div class="col-6">
                                            <a href="/crdPunto/view/cliente.php"><button type="button" class="btn btn-outline-info btn-lg">REGRESAR TIPO EXAMEN RADIOLOGICO</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php include_once "../temp/finmenu.php" ?>
                    <?php include "../temp/libjs.php" ?>
                    <script src="../js/elegirOdontologo.js"></script>
                    <script src="../js/elegirPaciente.js"></script>
                    <script src="../js/elegirExamen.js"></script>
                    <?php
                    include_once "modal/listaOdontologo.php";
                    include_once "modal/listaPaciente.php";
                    include_once "modal/listaExamenes.php";
                    ?>

    </body>

    </html>



<?php
} else {
    header("location:login.php");
}
?>