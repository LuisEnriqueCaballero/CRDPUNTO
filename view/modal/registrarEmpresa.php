<!-- Modal -->
<div class="modal fade" id="empresaeregistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registar Nuevo Marca de equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Nombre Empresa</label>
                    <input type="text" name="empresa" id="empresa" placeholder="Ingrese el nombre de la empresa" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" placeholder="descripcion" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" name="registrar" id="registrar">Registrar</button>
      </div>
    </div>
  </div>
</div>
