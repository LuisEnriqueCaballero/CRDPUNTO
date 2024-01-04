<?php
include_once '../config/conexion.php';
$conectar = new conectar();
$con = $conectar->conexion()
?>
<!-- Modal -->
<div class="modal fade" id="odontogoloregistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registar Nuevo Odontologo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formularioO">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Tipo Documento</label>
              <select name="tipo_documento" id="tipo_documento" class="form-control">
                <option value="0">Seleccione el tipo documento</option>
                <option value="1">DNI</option>
                <option value="2">PASSAPORTE</option>
                <option value="3">CEDULA</option>
                <option value="4">CPP</option>
                <option value="5">PTP</option>
                <option value="6">CARNET DE EXTANJERIA</option>
                <option value="7">COP</option>
                <option value="8">R.U.C</option>
              </select>
            </div>
            <div class="form-group col-md-6" hidden>
              <label for="">INGRESE EL COP</label>
              <input type="text" name="numero" id="numero" placeholder="Ingrese el COP" class="form-control" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
              <label for="">INGRESE NUMERO DEL DOCUMENTO</label>
              <input type="text" name="numeroD" id="numeroD" placeholder="Ingrese documento" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Nombre Completo</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre completo" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-6">
              <label for="">Apellido Completo</label>
              <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese apellido completo" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="">Telefono</label>
              <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese numero telefono" autocomplete="off">
            </div>
            <div class="form-group col-md-4">
              <label for="">fecha de nacimiento</label>
              <input type="text" name="cumpleaño" id="cumpleaño" class="form-control" placeholder="Ingrese su fecha de nacimiento" autocomplete="off" >
            </div>
            <div class="form-group col-md-4">
              <label for="">Genero</label>
              <select name="genero" id="genero" class="form-control">
                <option value="0">Seleccione genero</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">COP</label>
              <input type="text" name="cop" id="cop" class="form-control" placeholder="Ingrese su COP" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
              <label for="">Clinica</label>
              <input type="text" name="clinica" id="clinica" class="form-control" placeholder="Ingrese el nombre de su clinica" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="">Departamento</label>
              <select name="departamento" id="departamento" class="form-control">
                <option value="Seleccione Departamento">Seleccione Departamento</option>
                <?php
                $query = mysqli_query($con, "SELECT idDepa, departamento FROM ubdepartamento");
                while ($ver = mysqli_fetch_row($query)) {
                  $iddepartamento = $ver[0];
                  $departamento = $ver[1];
                ?>
                  <option value="<?php echo $iddepartamento ?>"><?php echo $departamento ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="">Provincia</label>
              <select name="provincia" id="provincia" class="form-control">
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="">Distrito</label>
              <select name="distrito" id="distrito" class="form-control">
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="">Direccion</label>
              <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese su direccion" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
            <!--<div class="form-group col-md-6">-->
            <!--  <label for="">correo</label>-->
            <!--  <input type="text" name="correo" id="correo" class="form-control" placeholder="Ingrese su correo electronico" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">-->
            <!--</div>-->
            <div class="form-group col-md-6" hidden>
              <input type="text" name="bienvenida" id="bienvenida" class="form-control" placeholder="Ingrese su direccion" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-6" hidden>
              <input type="text" name="tipo" id="tipo" class="form-control" value="2">
            </div>
          </div>
          <h4>Crear un usuario</h4>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Usuario</label>
              <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Crea un usuario" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-6">
              <label for="">Contraseña</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Crea una contraseña" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-6" hidden>
                <label for="">sede</label>
                <input type="text" name="sede" id="sede" class="form-control" value="<?php echo $usuario;?>">
            </div>
            <div class="form-group col-md-12">
              <label for="">correo</label>
              <input type="text" name="correo" id="correo" class="form-control" placeholder="Ingrese su correo electronico" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
          </div>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" name="registrarO" id="registrarO">Registrar</button>
      </div>
    </div>
  </div>
</div>
