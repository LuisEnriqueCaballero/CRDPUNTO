
<!-- Modal -->
<div class="modal fade" id="equiporegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Nuevo Equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario">       
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="">Marca</label>
                    <input type="text" name="marca" id="marca" class="form-control" placeholder="Seleciona el nombre de la marca" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group col-md-5">
                    <label for="">Modelo</label>
                    <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Ingrese el nombre del modelo de equipo" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group col-md-2">
                  <label for="">cantidad</label>
                  <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" placeholder="0">
                </div>
            </div>
            <div class="form-row justify-content-between">
                <div class="form-group col-md-4">
                  <label for="">Precio</label>
                  <input type="text" name="precio" id="precio" oninput="calcular()" autocomplete="off" class="form-control" placeholder="$/0.00">
                </div>
                
                <div class="form-group col-md-4">
                  <label for="">Punto Generado</label>
                  <input type="text" name="puntog" id="puntog" class="form-control" placeholder="0" step="0.001">
                </div>
                <div class="form-group col-md-4">
                  <label for="">Punto Canjeo</label>
                  <input type="text" name="puntoc" id="puntoc" class="form-control" placeholder="0">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Descripcion</label>
                    <textarea name="descripcion" id="descripcion"  class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Informacion del equipo"></textarea>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary"  id="registrar">Registrar</button>
      </div>
    </div>
  </div>
</div>
