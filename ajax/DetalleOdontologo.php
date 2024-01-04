<?php
include_once '../config/conexion.php';
$conectar = new conectar();
$con = $conectar->conexion();
$id = $_POST['id'];

$sql = "SELECT * FROM odontologo WHERE DNI='$id'";
$query = mysqli_query($con, $sql);
while ($ver = mysqli_fetch_array($query)) {
?>
    <div class='row align-items-center'>
        <div class='col-12 col-md-4'>
            <img src='../images/odontologo.jpg' class='img-fluid'>
        </div>
        <div class='col-12 col-md-8'>
            <h5 class='card-title mb-1'><span><?php echo $ver['apellido']." ".$ver['nombre']?></span></h5>
            <p class='mb-0 font-12 font-italic'><span><?php echo $ver['direccion']?></span></p>
            <hr>
            <b>Numero documento:</b> <span><?php echo $ver['DNI']?></span><br>
            <b>Tel&eacute;fono:</b> <span><?php echo $ver['telefono']?></span><br>
            <b>E-Mail:</b> <span><?php echo $ver['correo_electronico']?></span><br>
            <b>Clinica:</b> <span><?php echo $ver['clinica']?></span><br>
            <b>Fecha nacimiento:</b> <span><?php echo $ver['fecha']?></span><br>
            <b>C.O.P:</b> <span><?php echo $ver['cop']?></span><br>
            <b>F. Registro:</b> <span><?php echo $ver['registrado']?></span>
        </div>
    </div>
<?php
}
?>