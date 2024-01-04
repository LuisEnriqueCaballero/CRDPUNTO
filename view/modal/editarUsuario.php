<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();
?>
<!-- Modal -->
<div class="modal fade" id="usuarioactualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormulariA">
                    <input type="text" hidden name="iddocumento" id="iddocumento">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nombre Administrador</label>
                            <input type="text" name="nombreA" id="nombreA"  class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Usuario</label>
                            <input type="text" name="usuarioA" id="usuarioA"  class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Contraseña</label>
                            <input type="password" name="passwordA" id="passwordA" class="form-control"  autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Seleccione la Empresa</label>
                            <select name="empresaA" id="empresaA" class="form-control">
                                <option value="0">Seleccione Empresa</option>
                                <?php
                                $query=mysqli_query($con,"SELECT * FROM empresa");
                                    while($ver=mysqli_fetch_array($query)){
                                        ?>
                                        <option value="<?php echo $ver[0]?>"><?php echo $ver[1]?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-row" hidden>
                            <div class="form-group col-md-4">
                                <input type="text" value="1" name="roll" id="roll">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="actualizar" name="actualizar">actualizar</button>
            </div>
        </div>
    </div>
</div>