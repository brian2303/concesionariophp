<div class="modal fade" id="reg-cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Registrar Cliente <i class="fa fa-user-plus"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= getUrlControllerMethod("particular","registrar")?>" method="POST">
          <div class="form-group">
            <label for="cedula">Cedula</label>
            <input type="text" name="cedula" class="form-control" id="cedula">
          </div>
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre">
          </div>
          <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" class="form-control" id="apellido">
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