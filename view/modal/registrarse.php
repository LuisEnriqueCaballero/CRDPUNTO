<!-- Modal -->

<div class="modal fade" id="registrarse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Regístrate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Selecciona tipo de documento</label>
                            <select name="tipo_documento" id="tipo_documento" class="form-control" onchange="getval(this)">
                                <option value="0">Seleccione el tipo documento</option>
                                <option value="1">DNI</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" hidden>
                            <label for="">INGRESE EL COP</label>
                            <input type="text" name="numero" id="numero" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Ingrese su número de documento</label>
                            <input type="text" name="numeroD" id="numeroD" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nombre Completo</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Apellido Completo</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Fecha de nacimiento</label>
                            <input type="text" name="cumpleaño" id="cumpleaño" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Género</label>
                            <select name="genero" id="genero" class="form-control">
                                <option value="0">Seleccione género</option>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="FEMENINO">FEMENINO</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Especialidad</label>
                            <input type="text" name="especialidad" id="especialidad" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">cop</label>
                            <input type="text" name="cop" id="cop" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Clínica</label>
                            <input type="text" name="clinica" id="clinica" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
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
                            <label for="">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese su direccion" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                        </div>
                        <!--<div class="form-group col-md-6">-->
                        <!--  <label for="">correo</label>-->
                        <!--  <input type="text" name="correo" id="correo" class="form-control" placeholder="Ingrese su correo electronico" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">-->
                        <!--</div>-->
                        <div class="form-group col-md-6" hidden>
                            <input type="text" name="bienvenida" id="bienvenida" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group col-md-6" hidden>
                            <input type="text" name="tipo" id="tipo" class="form-control" value="2">
                        </div>
                    </div>
                    <h4>Crear un usuario</h4>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                        </div>
                       
                        <div class="form-group col-md-12">
                            <label for="">correo</label>
                            <input type="text" name="correo" id="correo" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer justify-content-center" >
                <button type="button" class="btn btn-success btn-lg" name="regístrate" id="registrase">Registrarme</button>
            </div>
        </div>
    </div>
</div>

<script>
    function getval(sel) {
        if (sel.value == '0') {

            $("#numeroD").val('');
            $("#nombre").val('');
            $("#apellido").val('');
            $("#telefono").val('');
            $("#cumpleaño").val('');
            $("#especialidad").val('');
            $('#clinica').val();
            $('#cop').val();
            $('#direccion').val('');
            $('#usuario').val('');
            $('#password').val('');
            $('#correo').val('');
            $('#numeroD').attr('placeholder', '');
            $('#nombre').attr('placeholder', '');
            $('#apellido').attr('placeholder', '');
            $('#telefono').attr('placeholder', '');
            $('#cumpleaño').attr('placeholder', '');
            $('#clinica').attr('placeholder', '');
            $('#direccion').attr('placeholder', '');
            $('#usuario').attr('placeholder', '');
            $('#password').attr('placeholder', '');
            $('#cop').attr('placeholder', '');
            $('#correo').attr('placeholder', '');
            $("#especialidad").attr('placeholder', '');
        }
        if (sel.value == '1') {

            $("#numeroD").val('');
            $("#nombre").val('');
            $("#apellido").val('');
            $("#telefono").val('');
            $("#cumpleaño").val('');
            $("#especialidad").val('');
            $('#clinica').val();
            $('#cop').val();
            $('#direccion').val('');
            $('#usuario').val('');
            $('#password').val('');
            $('#correo').val('');
            $('#numeroD').attr('placeholder', 'Ingrese tu número de DNI');
            $('#nombre').attr('placeholder', 'Ingrese nombre completo');
            $('#apellido').attr('placeholder', 'Ingrese apellido completo');
            $('#telefono').attr('placeholder', 'Ingrese número teléfono');
            $('#cumpleaño').attr('placeholder', '01/01/1900');
            $('#clinica').attr('placeholder', 'Ingrese el nombre de su clinica');
            $("#especialidad").attr('placeholder', 'Escribe su especialidad');
            $('#direccion').attr('placeholder', 'Ingrese la dirección');
            $('#usuario').attr('placeholder', 'Crear un usuario');
            $('#password').attr('placeholder', 'Crear un password');
            $('#cop').attr('placeholder', 'Ingrese su número de C.O.P');
            $('#correo').attr('placeholder', 'Ingrese su correo electronico');
            

        }

    }
</script>