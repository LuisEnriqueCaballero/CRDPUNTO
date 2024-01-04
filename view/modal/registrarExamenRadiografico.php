
<!-- Modal -->
<div class="modal fade" id="radiologicoRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registar Nuevo Examen Radiografia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Tipo de Examen Radiografico</label>
                    <input type="text" name="radiografico" id="radiografico" placeholder="Ingrese nombre de tipo Examen" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Costo del Examen</label>
                    <input type="text" name="precio" id="precio" oninput="calculoRadiografia()" autocomplete="off" class="form-control" placeholder="S/0.00">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">punto generado</label>
                    <input type="text" name="puntog" id="puntog" autocomplete="off" class="form-control" placeholder="0" step="0.001" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="">punto canjeo</label>
                    <input type="text" name="puntoc" id="puntoc" autocomplete="off" class="form-control" placeholder="0">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="registrar">Registrar</button>
      </div>
    </div>
  </div>
</div>