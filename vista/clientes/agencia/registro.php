<div class="modal fade" id="reg-agencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Registrar Agencia <i class="fa fa-user-plus"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= getUrlControllerMethod("agencia","registrar")?>" method="POST">
          <div class="form-group">
            <label for="cedula">Nit</label>
            <input type="text" name="nit" class="form-control" id="nit">
          </div>
          <div class="form-group">
            <label for="nombre">Razón social</label>
            <input type="text" name="razon-social" class="form-control" id="razon-social">
          </div>
          <div class="form-group">
            <label for="domicilio">Domicilio</label>
            <input type="text" name="domicilio" class="form-control" id="domicilio">
          </div>
          <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" class="form-control" id="telefono">
          </div>
          <button type="submit" class="btn btn-dark">Registrar</button>
        </form>
      </div>

    </div>
  </div>
</div>