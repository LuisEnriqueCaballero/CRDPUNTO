<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();
$_SESSION['odontologo'];

$query=mysqli_query($con,"SELECT DNI,nombre,apellido,usuario,bienvenida FROM odontologo WHERE usuario ='$_SESSION[odontologo]'");
while($ver=mysqli_fetch_array($query)){
    $id_doctor=$ver[0];
    $datos=$ver[2]." ".$ver[1];
    $bienvenida=$ver[4];
    $query1=mysqli_query($con,"SELECT SUM(punto),SUM(puntod) FROM detalle_venta WHERE Id_doctor='$id_doctor'");
    while($ver1=mysqli_fetch_row($query1)){
        $ganado=$ver1[0];
        $canjeado=$ver1[1];
    }
}
 $total=$bienvenida+$ganado-$canjeado;

$url='/crdPunto/view';
?>
<a href="#" class="img logo " style="background-image: url(../images/logocrd.png);"></a>
<br>
<ul class="list-unstyled components mb-5">
    
    <li class="active">
        <a href="<?php echo $url?>/bienvenido.php"><span class="fa fa-home" aria-hidden="true"> Inicio</span></a>
    </li>
    
    <li>
        <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-list-alt" aria-hidden="true"> Mis Lista</i></a>
        <ul class="collapse list-unstyled" id="pageSubmenu1">
            <li>
                <a href="<?php echo $url?>/listapaciente1.php">Mis Pacientes</a>
                <!--<a href="<?php echo $url?>/listapaciente.php">Mi Lista de paciente Atendido</a>-->
                
            </li>
        </ul>
    </li>
     <li>
        <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-star-o" aria-hidden="true"> Mis puntos</i></a>
        <ul class="collapse list-unstyled" id="pageSubmenu4">
            <li>
                <a href="<?php echo $url?>/PuntoAcumulado.php">Mi punto Acumulado</a>
                <a href="<?php echo $url?>/punto.php">¿Que son los punto?</a>
                
            </li>
        </ul>
    </li>
    <li>
        <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Canjear mis puntos</a>
        <ul class="collapse list-unstyled" id="pageSubmenu2">
            <li>
                <a href="<?php echo $url?>/canjearexamen.php">Canjear mi punto por un examen</a>
                
            </li>
        </ul>
    </li>
    <li>
        <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Configuracion</a>
        <ul class="collapse list-unstyled" id="pageSubmenu3">
            <li>
                <a href="<?php echo $url?>/actualizardatos.php">Actualizar mis datos</a>
            </li>
        </ul>
    </li>
   
</ul>
<!-- footer sidebar -->

<!-- <div class="footer">
	        	<p>Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.</p>
	        </div> -->

</div>
</nav>