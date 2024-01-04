<?php
session_start();

include_once "../config/conexion.php";
if (isset($_SESSION['usuario'])) {
$id=intval($_GET['id']);

$conexion=new conectar();
$con=$conexion->conexion();    

$query=mysqli_query($con,"SELECT dv.Id_detalle,pa.Id_documento,pa.nombre,pa.apellido,
pa.DocumentoI,od.DNI,od.nombre,od.apellido,od.DocumentoI,
ra.id_radiografia,ra.tipo_examen,ra.precio,ra.punto_ganado,
dv.imagen1,dv.imagen2,dv.imagen3,dv.link,
dv.Usuario,dv.informe,dv.fecha_registro 
FROM detalle_venta dv INNER JOIN paciente pa ON dv.Id_paciente=pa.Id_documento 
INNER JOIN odontologo as od ON dv.Id_doctor=od.DNI 
INNER JOIN radiografia as ra ON dv.id_radiografia=ra.id_radiografia 
WHERE dv.Id_detalle='$id'");

while($ver=mysqli_fetch_array($query)){
    $iddetalle=$ver[0];
    $idpaciente=$ver[4];
    $datopaciente=$ver[3]." ".$ver[2];
    $documentoPaciente=$ver[1];
    $idodontologo=$ver[5];
    $datosOdontologo=$ver[7]." ".$ver[6];
    $documentoOdontologo=$ver[8];
    $idradiografia=$ver[9];
    $nombreradiografia=$ver[10];
    $precioradiografia=$ver[11];
    $puntoradiografia=$ver[12];
    $imagen1adiografia=$ver[13];
    $imagen2radiografia=$ver[14];
    $imagen3radiografia=$ver[15];
    $linkradiografia=$ver[16];
    $usuario=$ver[17];
    $pdfradiografia=$ver[18];
    $fecha=$ver[19];
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
                        <form method="POST" action="../ajax/Editarservicio.php?id=<?php echo $iddetalle ?>"  enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h2 class="title" style="font-weight:bolder; color:#119FD4">REALIZAR UN EXAMEN DE RADIOGRAFIA</h2>
                                </div>
                                <div class="card-body">
                                    <h5>Selecciona a tu Paciente</h5>
                                    <hr>
                                    <div class="form-row justify-content-around">
                                        <div hidden>
                                            <input type="text" name="idPaciente" id="idPaciente" value="<?php echo $idpaciente?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Numero de Identidad</label>
                                            <input type="text" name="dni" id="dni" class="form-control" value="<?php echo $documentoPaciente?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Paciente</label>
                                            <input type="text" name="name" id="name" class="form-control" readonly value="<?php echo $datopaciente?>">
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
                                            <input type="text" name="idOdontologo" id="idOdontologo" value="<?php echo $idodontologo?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Numero de Identidad</label>
                                            <input type="text" name="dni_odontologo" id="dni_odontologo" class="form-control" value="<?php echo $documentoOdontologo?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Odontologo</label>
                                            <input type="text" name="name_odontologo" id="name_odontologo" class="form-control" readonly value="<?php echo $datosOdontologo?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Seleccionar al Odontologo</label>
                                            <button type="button" name="buscar" id="buscar" class="form-control btn btn-dark" data-toggle="modal" data-target="#registroOdontologo"><span class="fa fa-search" aria-hidden="true"> Haz Click aqui!</span></button>
                                        </div>
                                        <input type="text" hidden name="pago" id="pago" value="CANCELADO">
                                        <input type="text" name="usuario" hidden id="usuario" value="<?php echo $usuario ?>">
                                    </div>
                                    <h5>Datos del Examen Radiografico</h5>
                                    <hr>
                                    <div hidden>
                                        <label for="">id_radiografia</label>
                                        <input type="text" name="id_radiografia" id="id_radiografia" value="<?php echo $idradiografia?>">
                                    </div>
                                    <div class="form-row justify-content-around">

                                        <div class="form-group col-md-3">
                                            <label for="">Selecciona un servicio</label>
                                            <button type="button" name="buscar" id="buscar" class="form-control btn btn-secondary" data-toggle="modal" data-target="#listaexamen"><span class="fa fa-search" aria-hidden="true"> Haz click aqui!</span></button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Descripcion del examen radiografico</label>
                                            <input type="text" class="form-control" name="radiografia" id="radiografia" value="<?php echo $nombreradiografia?>" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Precio</label>
                                            <input type="text" class="form-control" name="precio" id="precio" value="<?php echo $precioradiografia?>" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Punto ganado</label>
                                            <input type="text" class="form-control" name="puntog" id="puntog" value="<?php echo $puntoradiografia?>" readonly>
                                        </div>

                                    </div>
                                    <h5>Subir Imagenes</h5>
                                    <hr>
                                    <div class="form-row justify-content-around">
                                        <div class="form-group col-md-4">
                                            <?php 
                                            if(strlen($imagen1adiografia)!=''){

                                            ?>
                                            <img height="200px" width="200px" src="../ajax/Archivos/<?php echo $iddetalle?>/<?php echo $imagen1adiografia ?>" alt="">
                                            <?php }else{

                                            } ;?>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <?php 
                                            if(strlen($imagen2radiografia)!=''){
                                            ?>
                                            <img height="200px" width="200px" src="../ajax/Archivos/<?php echo $iddetalle?>/<?php echo $imagen2radiografia ?>" alt="" reque>
                                            <?php }else{

                                            } ;?>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <?php 
                                            if(strlen($imagen3radiografia)!=''){
                                            ?>
                                            <img height="200px" width="200px" src="../ajax/Archivos/<?php echo $iddetalle?>/<?php echo $imagen3radiografia ?>"  alt="">
                                            <?php }else{} ;?>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <a href="actualizarimagenes.php?id=<?php echo $id?>"><span class="btn  btn-secondary">Actualizar Imagenes</span></a>
                                        </div>
                                    </div>
                                    <h5>Subir tu informe</h5>
                                    <hr>
                                    <div class="form-row justify-content-around">
                                        <div class="form-group col-md-4">
                                            <label for="">Subir Informe</label>
                                            <br>
                                            
                                            <a href="actualizararchivo.php?id=<?php echo $id?>"><span class="btn  btn-secondary">subir archivo</span></a>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Copiar Link</label>
                                            <input type="text" class="form-control" name="link" id="link" value="<?php echo $linkradiografia?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">fecha del examen</label>
                                            <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $fecha?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="form-row">
                                        <div class="col-6">
                                            <button type="submit" name="Aregistro" id="Aregistro" class="btn btn-outline-info btn-lg">Actualizar</button>
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