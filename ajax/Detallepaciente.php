<?php
include_once '../config/conexion.php';
$conexion=new conectar();
$con=$conexion->conexion();

$id=mysqli_real_escape_string($con,htmlentities($_POST['id']));

$sql="SELECT * FROM paciente WHERE Id_documento='$id'";
$query=mysqli_query($con,$sql);
while($ver=mysqli_fetch_array($query)){
    ?>
    <div class='row align-items-center'>
        <div class='col-12 col-md-4'>
            <img src='../images/user.jpg' class='img-fluid'>
        </div>
        <div class='col-12 col-md-8'>
            <h5 class='card-title mb-1'><span><?php echo $ver['apellido']." ".$ver['nombre']?></span></h5>
            <p class='mb-0 font-12 font-italic'><span><?php echo $ver['direccion']?></span></p>
            <hr>
            <b>Numero documento:</b> <span><?php echo $ver['Id_documento']?></span><br>
            <b>Tel&eacute;fono:</b> <span><?php echo $ver['telefono']?></span><br>
            <b>E-Mail:</b> <span><?php echo $ver['correo_electronico']?></span><br>
            
            <b>Edad:</b> <span><?php echo $ver['edad']?> a&ntilde;os</span><br>
            <b>Sexo:</b> <span><?php echo $ver['sexo']?></span><br>
            <b>F. Registro:</b> <span><?php echo $ver['registrado']?></span>
        </div>
    </div>
    <?php
}
?>