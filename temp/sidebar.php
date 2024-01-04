<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();
$_SESSION['usuario'];

$query=mysqli_query($con,"SELECT em.nombre,us.nombre,us.apellido,usuario,us.Id_roll,em.logo FROM usuario as us INNER JOIN empresa as em
on us.Id_empresa=em.id_empresa WHERE usuario ='$_SESSION[usuario]'");
while($ver=mysqli_fetch_array($query)){
    $empresa=$ver[0];
    $datos=$ver[2]." ".$ver[1];
    $roll=$ver[4];
    $logo=$ver[5];
}
$query1=mysqli_query($con,"SELECT COUNT(tipo) FROM detalle_venta WHERE tipo='PROCESO'");
while($ver1=mysqli_fetch_row($query1)){
    $numero=$ver1[0];
}

$url='/crdPunto/view';

?>
<a href="#" class="img logo" style="background-image: url(../images/<?php echo $logo?>);"></a>
<ul class="list-unstyled components mb-5">
    
    <li class="active">
        <a href="<?php echo $url?>/inicio.php"><span class="fa fa-home" aria-hidden="true"> Inicio</span></a>
    </li>
    
   <?php if($empresa=='ADMIN'):?>
    <li>
        <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-building-o" aria-hidden="true"> Empresa</span></a>
        <ul class="collapse list-unstyled" id="homeSubmenu1">
            <li>
                <a href="<?php echo $url?>/empresa.php">Lista Empresas</a>
            </li>
        </ul>
    </li> 
    <li>
        <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-user" aria-hidden="true"> Usuario</span></a>
        <ul class="collapse list-unstyled" id="homeSubmenu2">
            <li>
                <a href="<?php echo $url?>/usuario.php"> Lista de usuarios</a>
            </li>
        </ul>
    </li>
    
    <?php endif;?>
    <?php if($empresa=='ADMIN' || $empresa=='CRD' || $empresa =='CRDGENERAL'):?>
    <li>
        <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-male" aria-hidden="true"> Paciente</span></a>
        <ul class="collapse list-unstyled" id="pageSubmenu3">
            <?php if($empresa=='CRD'):?>
            <li>
                <a href="<?php echo $url?>/paciente.php">Lista de pacientes</a>
            </li>
            <?php endif;?>
            <?php if($empresa=='ADMIN' || $empresa =='CRDGENERAL'):?>
            <li>
                <a href="<?php echo $url?>/PacienteG.php">Lista de Pacientes</a>
            </li>
            <?php endif;?>
        </ul>
    </li>
    <li>
        <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-user-md" aria-hidden="true"> Odontologo</span></a>
        <ul class="collapse list-unstyled" id="pageSubmenu4">
            <?php if($empresa=='CRD'):?>
            <li>
                <a href="<?php echo $url?>/odontologo.php">Lista de odontologos</a>
            </li>
            <?php endif;?>
            <?php if($empresa=='ADMIN' || $empresa =='CRDGENERAL'):?>
            <li>
                <a href="<?php echo $url?>/odontologoG.php">Lista de odontologo</a>
            </li>
            <?php endif;?>
        </ul>
    </li>
    <?php endif?>
    <?php if($empresa=='ADMIN'):?>
    <li>
        <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-product-hunt" aria-hidden="true"> Producto</span></a>
        <ul class="collapse list-unstyled" id="pageSubmenu5">    
            <li>
                <a href="<?php echo $url?>/equipo.php">Lista de Equipo</a>
            </li>
            <li>
                <a href="<?php echo $url?>/implante.php">Lista de Implante</a>
            </li> 
        </ul>
    </li>
   <?php endif;?>
   <?php if($empresa=='ADMIN' || $empresa=='CRD' || $empresa =='CRDGENERAL'): ?>
    <li>
        <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-registered" aria-hidden="true"> Radiografia</span></a>
        <ul class="collapse list-unstyled" id="pageSubmenu6">
            
            <li>
                <a href="<?php echo $url?>/radiografia.php">Lista Tipos de Examenes</a>
            </li>
            
            <li>
                <a href="<?php echo $url?>/formularioradiografia.php">Servicio</a>
            </li>
            <li>
                <a href="<?php echo $url?>/cliente.php">Lista de pacientes Atendidos</a>
            </li>
            <?php if($empresa=='ADMIN' || $empresa =='CRDGENERAL'):?>
            <li>
                <a href="<?php echo $url?>/clienteG.php">Lista General de paciente atendidos</a>
            </li>
            <?php endif;?>
        </ul>
    </li>
    <?php endif;?>
    <?php if($empresa=='ADMIN'):?>
    <li>
        <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-shopping-cart" aria-hidden="true"> Compra</span></a>
        <ul class="collapse list-unstyled" id="pageSubmenu7">
            <li>
                <a href="<?php echo $url?>/radiografia.php">Formulario de venta de equipos</a>
            </li>
            <li>
                <a href="<?php echo $url?>/cliente.php">Listado de venta de equipo</a>
            </li>
            <li>
                <a href="<?php echo $url?>/radiografia.php">Formulario de venta de implante</a>
            </li>
            <li>
                <a href="<?php echo $url?>/cliente.php">Listado de venta de implante</a>
            </li>
        </ul>
    </li>
    <?php endif;?>
    <li>
        <a href="#pageSubmenu8" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="text-danger">(<?php echo $numero?>)</span><span class="fa fa-shopping-cart" aria-hidden="true"> Canjeo de Puntos</span></a>
        <ul class="collapse list-unstyled" id="pageSubmenu8">
            <li>
                <a href="<?php echo $url?>/procesocanjeo.php"><span class="text-danger">(<?php echo $numero?>)</span>Lista de Punto en proceso de canjeo</a>
                <a href="<?php echo $url?>/canjeoreclamando.php">Lista de Punto canjeado</a>
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
