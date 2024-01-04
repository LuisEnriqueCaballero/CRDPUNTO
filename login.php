<?php
session_start();
include_once 'config/conexion.php';
$conectar = new conectar();
$con = $conectar->conexion()
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Iniciar Sesión CRD-CLOUD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/fontawesome/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
===============================================================================================
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
===============================================================================================
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
===============================================================================================
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
===============================================================================================
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bgfondo.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="formlogin" >

					<img src="images/logocrd.png" style="width:100%;height:auto ;">


					<!--	<span class="login100-form-title p-b-34 p-t-27">
						Iniciar Sesión
					</span>-->

					<div class="wrap-input100 validate-input" data-validate="Ingrese Usuario">
						<input class="input100" type="text" name="usuario" id="usuario" placeholder="Usuario" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingrese Contraseña">
						<input class="input100" type="password" name="password" id="password" placeholder="Contraseña" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Recordarme
						</label>
					</div>

					<div class="container-login100-form-btn justify-content-around">
						<button type="button" class="login100-form-btn" id="iniciar">
							<b>Iniciar sesión</b>
						</button>
						 <span type="button" class="login100-form-btn" data-toggle="modal" data-target="#registrarse">
							<b>Regístrate</b>
						</span> 
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#" style="font-size:'20px';">
							¿Olvidaste tu contraseña?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="lib/js/jquery.min.js"></script>
	<!--===============================================================================================
	<script src="vendor/animsition/js/animsition.min.js"></script>
===============================================================================================-->
	<script src="lib/js/popper.js"></script>
	<script src="lib/js/bootstrap.min.js"></script>
	<script src="js/selectanillado.js"></script>
	<?php
	include_once "view/modal/registrarse.php";
	?>
	<!--===============================================================================================
	<script src="vendor/select2/select2.min.js"></script>
===============================================================================================
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
===============================================================================================
	<script src="vendor/countdowntime/countdowntime.js"></script>
===============================================================================================-->
<script src="js/login.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#registrase').click(function(){
        var dato=$('#formulario').serialize();
        
        $.ajax({
            type:"POST",
            data:dato,
            url:"/crdPunto/ajax/registrase.php",
            success:function(r){
               
                if(r==2){
                    swal("ESTE USUARIO YA ESTA USADO , ESCRIBA OTRO USUARIO DIFERENTE AL ANTERIOR!", "AS CLICK AL BOTON OK!", "info");
                }else if(r==3){
                    swal("EL COP DEL ODONTOLOGO YA EXISTE EN NUESTRA BASE DE DATOS !", "AS CLICK AL BOTON OK!", "info")
                }
                else if(r=1){
                    swal("Te registraste correctamente!", "Haz click en el boton OK, para continuar!", "success");
                    $('#formulario')[0].reset();
                
            }
         }
        })
    })
})
</script>
    <script src="js/main.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>