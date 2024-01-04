<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();
?>
<!-- Modal -->
<div class="modal fade" id="odontogoloactualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="FormulariR">
          <div class="form-row">
            <input type="text" hidden name="iddocumento" id="iddocumento">
            <div class="form-group col-md-6">
              <label for="">Tipo Documento</label>
              <select name="tipo_documentoA" id="tipo_documentoA" class="form-control">
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
              <label for="">Ingrese Numero Documeto</label>
              <input type="text" name="numeroA" id="numeroA" placeholder="Ingrese el numero documento" class="form-control" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
              <label for="">Ingrese Numero Documeto</label>
              <input type="text" name="numeroDA" id="numeroDA" placeholder="Ingrese el numero" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="">Nombre Completo</label>
              <input type="text" name="nombreA" id="nombreA" class="form-control" placeholder="Ingrese nombre completo" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-6">
              <label for="">Apellido Completo</label>
              <input type="text" name="apellidoA" id="apellidoA" class="form-control" placeholder="Ingrese apellido completo" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="">Telefono</label>
              <input type="text" name="telefonoA" id="telefonoA" class="form-control" placeholder="Ingrese numero telefono">
            </div>
            <div class="form-group col-md-4">
              <label for="">fecha de nacimiento</label>
              <input type="text" name="fechaA" id="fechaA" class="form-control" placeholder="Ingrese su fecha de nacimiento">
            </div>
            <div class="form-group col-md-4">
              <label for="">Genero</label>
              <select name="generoA" id="generoA" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                <option value="0">Seleccione genero</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="">Departamento</label>
              <select name="departamentoA" id="departamentoA" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                      <option value="0">Seleccione Departamento</option>
                      <?php
                      $sql="SELECT * FROM ubdepartamento";
                      $query=mysqli_query($con,$sql);
                      while($ver=mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php echo $ver[0]?>"><?php echo $ver[1]?></option>
                        <?php
                      }
                      ?>
                      <!-- <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option> -->
                  </select>
              <!-- <input type="text" name="departamentoA" id="departamentoA" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();"> -->
            </div>
            <div class="form-group col-md-4">
              <label for="">Provincia</label>
              <select name="provinciaA" id="provinciaA" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                      <option value="0">Seleccione Provincia</option>
                      <?php
                      $sql="SELECT * FROM ubprovincia";
                      $query=mysqli_query($con,$sql);
                      while($ver=mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php echo $ver[0]?>"><?php echo $ver[1]?></option>
                        <?php
                      }
                      ?>
                      <!-- <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option> -->
                  </select>
              <!-- <input type="text" name="provinciaA" id="provinciaA" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();"> -->

            </div>
            <div class="form-group col-md-4">
              <label for="">Distrito</label>
              <select name="distritoA" id="distritoA" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                      <option value="0">Seleccione Provincia</option>
                      <?php
                      $sql="SELECT * FROM ubdistrito";
                      $query=mysqli_query($con,$sql);
                      while($ver=mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php echo $ver[0]?>"><?php echo $ver[1]?></option>
                        <?php
                      }
                      ?>
                      <!-- <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option> -->
                  </select>
              <!-- <input type="text" name="distritoA" id="distritoA" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();"> -->

            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">COP</label>
              <input type="text" name="copA" id="copA" class="form-control" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
              <label for="">Clinica</label>
              <input type="text" name="clinicaA" id="clinicaA" class="form-control"  autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Direccion</label>
              <input type="text" name="direccionA" id="direccionA" class="form-control"  autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-6">
              <label for="">correo</label>
              <input type="text" name="correoA" id="correoA" class="form-control"autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Usuario</label>
              <input type="text" name="usuarioA" id="usuarioA" class="form-control"  autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-6">
              <label for="">Contraseña</label>
              <input type="password" name="passwordA" id="passwordA" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" name="actualizar" id="actualizar">Actualizar</button>
      </div>
    </div>
  </div>
</div>