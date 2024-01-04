<?php
session_start();
include_once "../config/conexion.php";
if (isset($_SESSION['odontologo'])) {
$conectar=new conectar();
$con=$conectar->conexion();
$query=mysqli_query($con,"SELECT * FROM odontologo WHERE usuario='$_SESSION[odontologo]'");
while($ver=mysqli_fetch_row($query)){
    $id_odontologo=$ver[0];
    $bienvenida=$ver[8];
    $query1=mysqli_query($con,"SELECT SUM(punto),SUM(puntod) FROM detalle_venta WHERE Id_doctor='$id_odontologo'");
    while($ver1=mysqli_fetch_row($query1)){
        $puntog=$ver1[0];
        $puntoc=$ver1[1];
    }
}
$resultado=$bienvenida+$puntog-$puntoc;
$query2=mysqli_query($con,"SELECT * FROM radiografia WHERE id_radiografia='$_GET[id_radiografia]'");
while($ver2=mysqli_fetch_row($query2)){
    $id_radiografia=$ver2[0];
    $descripcion=$ver2[1];
    $gastando=$ver2[4];
}
echo $gastando;
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
                        <form id="formulario1">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">PROCESO DE CANJEO POR UN EXAMEN RADIOGRAFICO</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div hidden>
                                            <label for="">id_radiografia</label>
                                            <input type="text" name="id_radiografia" id="id_radiografia" value="<?php echo $id_radiografia?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Tipo de Examen radiografico</label>
                                            <input type="text" class="form-control" name="examen" id="examen" value="<?php echo $descripcion ?>" readonly>
                                        </div>
                                        <div class="form-group col-3">
                                        <label for="">Valor de punto </label>
                                       
                                            <input type="text" class="form-control" name="descuentopunto" id="descuentopunto" value="<?php echo $gastando?>" readonly>
                                        </div>
                                    </div>
                                    <h5>Ingrese Datos tu paciente</h5>
                                    <div class="form-row justify-content-around">
                                    <div class="form-group col-md-4">
                                        <label for="">BUSCA A TU PACIENTE NUESTRA B.D</label>
                                        <button type="button" name="buscar" id="buscar" class="form-control btn btn-success" data-toggle="modal" data-target="#listaPaciente"><span class="fa fa-search" aria-hidden="true"> Haz Click aqui!</span></button>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">REGISTRA A TU PACIENTE</label>
                                        <button type="button" class="form-control  btn btn-primary" data-toggle="modal" data-target="#pacienteregistrar">
                                            <span class="fa fa-user-plus"> Registrar nuevo paciente</span>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="form-row">
                                        <input type="text" class="form-control"  name="idPaciente" id="idPaciente">
                                        <div class="from-group col-md-6">
                                            <label for="">INGRESE EL DNI DEL PACIENTE</label>
                                            <input type="text" class="form-control" id="dni" name="dni">
                                        </div>
                                        <div class="from-group col-md-6">
                                            <label for="">Apellido y Nombre del paciente</label>
                                            <input type="text" class="form-control" id="name" name="name" disabled>
                                        </div>
                                    </div>
                                    <div hidden>
                                        <label for="">tipo</label>
                                        <input type="text" value="PROCESO" name="tipo" id="tipo">
                                    </div>
                                    <div hidden>
                                    <label for="">Odontologo</label>
                                        <input type="text"  name="id_odontologo" id="id_odontologo" value="<?php echo $id_odontologo ?>">
                                    </div>
                                    <div hidden>
                                    <label for="">mis punto</label>
                                        <input type="text"  name="total" id="total" value="<?php echo $resultado?>">
                                    </div>
                                </div>
                                <div class="card-footer text-center ">
                                    <button type="button" class="btn btn-primary" name="canjear" id="canjear">Canjear</button>
                                    <button type="button" class="btn btn-info"><a href="canjearexamen.php" style="color:#fff;">Regresar</a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php include_once "../temp1/finmenu.php" ?>
                    <?php include_once "../temp1/libjs.php" ?>
                    <?php include_once "modal/registarPaciente.php"; 
                     include_once "modal/listaPaciente.php"; ?>
                    
                    
    </body>

    </html>
    <script src="../js/paciente.js"></script>
    <script src="../js/selectanillado.js"></script>
    <script src="../js/elegirPaciente.js"></script>
    <!-- <script src="../js/doubleclick.js"></script> -->
    <script src="../js/canjeo.js"></script>
<?php
} else {
    header("location:login.php");
}
?>