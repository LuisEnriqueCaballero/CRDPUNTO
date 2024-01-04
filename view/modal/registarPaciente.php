<?php 
include_once '../config/conexion.php';
$conectar=new conectar();
$con=$conectar->conexion()
?>
<!-- Modal -->
<div class="modal fade" id="pacienteregistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registar Nuevo Paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formularioP">
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
                    </select>
                </div>
                <div class="form-group col-md-6" hidden>
                    <label for="">Ingrese Numero Documeto</label>
                    <input type="text" name="numero" id="numero" placeholder="Ingrese el numero documento" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Ingrese Numero Documeto</label>
                    <input type="text" name="numeroD" id="numeroD" placeholder="Ingrese el numero documento" class="form-control" autocomplete="off" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Nombre Completo</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre completo" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Apellido Completo</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese apellido completo" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="">Telefono</label>
                  <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese numero telefono" autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                  <label for="">Edad</label>
                  <input type="text" name="edad" id="edad" class="form-control" placeholder="Ingrese su edad" autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                  <label for="">Genero</label>
                  <select name="genero" id="genero" class="form-control" >
                      <option value="0">Seleccione genero</option>
                      <option value="MASCULINO">MASCULINO</option>
                      <option value="FEMENINO">FEMENINO</option>
                  </select>
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
              <label for="">Departamento</label>
                  <select name="departamento" id="departamento" class="form-control">
                      <option value="Seleccione Departamento">Seleccione Departamento</option>
                      <?php
                      $query=mysqli_query($con,"SELECT idDepa, departamento FROM ubdepartamento");
                      while($ver=mysqli_fetch_row($query)){
                            $iddepartamento=$ver[0];
                            $departamento=$ver[1];
                        ?>
                        <option value="<?php echo $iddepartamento?>"><?php echo $departamento?></option>
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
                  <select name="distrito" id="distrito" class="form-control" >
                  </select>
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese direccion" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Correo Electronico</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Ingrese el correo electronico" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group col-md-6" hidden>
                    <label for="">sede</label>
                    <input type="text" name="sede" id="sede" class="form-control" value="<?php echo $usuario;?>">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="registrarP" name="registrarP">Registrar</button>
      </div>
    </div>
  </div>
</div>