<?php
session_start();
include_once "../config/conexion.php";
if (isset($_SESSION['usuario'])) {
$conectar=new conectar();
$con=$conectar->conexion();

// $sql="SELECT Id_detalle,Id_doctor,Id_paciente,Id_radiografia,tipo FROM detalle_venta WHERE Id_detalle='$_GET[id]'";
$query=mysqli_query($con,"SELECT dv.Id_detalle,pa.Id_documento,pa.nombre,pa.apellido,
pa.DocumentoI,od.DNI,od.nombre,od.apellido,od.DocumentoI,
ra.id_radiografia,ra.tipo_examen,dv.tipo 
FROM detalle_venta dv INNER JOIN paciente pa ON dv.Id_paciente=pa.Id_documento 
INNER JOIN odontologo as od ON dv.Id_doctor=od.DNI 
INNER JOIN radiografia as ra ON dv.id_radiografia=ra.id_radiografia 
WHERE dv.Id_detalle='$_GET[id]'");

while($ver=mysqli_fetch_array($query)){
    $id_detalle=$ver[0];
    $id_doctor=$ver[5];
    $nombreCompletoDoctor=$ver[6]." ".$ver[7];
    $cop=$ver[8];
    $id_paciente=$ver[1];
    $nombreCompletoPaciente=$ver[3]." ".$ver[2];
    $documento_paciente=$ver[4];
    $id_radiografia=$ver[9];
    $datosRadiologia=$ver[10];
    $tipo=$ver[11];

}
echo $id_detalle;
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
                    <div class="container">
                        <div class="card">
                        <form method="POST" action="../ajax/Canjeoservicio.php?id=<?php echo $id_detalle ?>"  enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h2 class="title" style="font-weight:bolder; color:#119FD4">Proceso de Canjeo por Examen Radiologico</h2>
                                </div>
                                <div class="card-body">
                                    <h5>Selecciona a tu Paciente</h5>
                                    <hr>
                                    <div class="form-row justify-content-around">
                                        <div hidden>
                                            <input type="text" name="idPaciente" id="idPaciente" value="<?php echo $id_paciente?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Numero de Identidad</label>
                                            <input type="text" name="dni" id="dni" class="form-control" value="<?php echo $documento_paciente?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Paciente</label>
                                            <input type="text" name="name" id="name" class="form-control" readonly value="<?php echo $nombreCompletoPaciente?>">
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
                                            <input type="text" name="idOdontologo" id="idOdontologo" value="<?php echo $id_doctor?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Numero de Identidad</label>
                                            <input type="text" name="dni_odontologo" id="dni_odontologo" class="form-control" value="<?php echo $cop?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Odontologo</label>
                                            <input type="text" name="name_odontologo" id="name_odontologo" class="form-control" readonly value="<?php echo $nombreCompletoDoctor?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Seleccionar al Odontologo</label>
                                            <button type="button" name="buscar" id="buscar" class="form-control btn btn-dark" data-toggle="modal" data-target="#registroOdontologo"><span class="fa fa-search" aria-hidden="true"> Haz Click aqui!</span></button>
                                        </div>
                                        
                                        <input type="text" name="usuario" hidden id="usuario" value="<?php echo $_SESSION['usuario'] ?>">
                                    </div>
                                    <h5>Datos del Examen Radiografico</h5>
                                    <hr>
                                    <div hidden>
                                        <label for="">id_radiografia</label>
                                        <input type="text" name="id_radiografia" id="id_radiografia" value="<?php echo $id_radiografia?>">
                                    </div>
                                    <div class="form-row justify-content-around">    
                                        <!--<div class="form-group col-md-3">-->
                                        <!--<label for="">Elige una promocion servicio</label>-->
                                        <!--<button type="button" name="buscar" id="buscar" class="form-control btn btn-success"data-toggle="modal" data-target="#listaPaciente"><span class="fa fa-search" aria-hidden="true"> BUSCAR</span></button>-->
                                        <!--</div>-->

                                        <div class="form-group col-md-6">
                                            <label for="">Descripcion del examen radiografico</label>
                                            <input type="text" class="form-control" name="radiografia" id="radiografia" value="<?php echo $datosRadiologia?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">ELIJE EL PROCESO</label>
                                            <input type="text" class="form-control" name="proceso" id="proceso" value="CANJEADO" readonly>
                                        </div>

                                    </div>
                                    <h5>Subir Imagenes</h5>
                                    <hr>
                                    <div class="form-row justify-content-around">
                                        <div class="form-group col-md-3">
                                            <label for="">Seleccionar una imagen</label>
                                            <input type="file" class="form-control" name="archivo1" id="archivo1" accept="image/*" value="">

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Seleccionar una imagen</label>
                                            <input type="file" class="form-control" name="archivo2" id="archivo2" accept="image/*" value="">

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Seleccionar una imagen</label>
                                            <input type="file" class="form-control" name="archivo3" id="archivo3" accept="image/*" value="">
                                        </div>
                                    </div>
                                    <h5>Subir tu informe</h5>
                                    <hr>
                                    <div class="form-row justify-content-around">
                                        <div class="form-group col-md-4">
                                            <label for="">Archivo</label>
                                            <input type="file" class="form-control" name="archivo4" id="archivo4" accept=" " value="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Copiar Link</label>
                                            <input type="text" class="form-control" name="link" id="link" value="">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">fecha del examen</label>
                                            <input type="date" class="form-control" name="fecha" id="fecha" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="form-row">
                                        <div class="col-6">
                                            <button type="submit" name="canjear" id="canjear" class="btn btn-outline-info btn-lg">PROCESO CANJEO</button>
                                        </div>
                                        <div class="col-6">
                                            <a href="/crdPunto/view/procesocanjeo.php"><button type="button" class="btn btn-outline-info btn-lg">REGRESAR AL REGISTRO</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <?php include_once "../temp/finmenu.php" ?>
                <?php include "../temp/libjs.php" ?>
                <!-- <script src="../js/procesocanjeo.js"></script> -->

    </body>

    </html>

<?php
} else {
    header("location:login.php");
}
?>