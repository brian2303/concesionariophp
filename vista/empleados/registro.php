<!-- modal -->

<div class="modal fade" id="regEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Registrar Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= getUrlControllerMethod("empleado","registrar")?>" method="POST">
          <div class="form-group">
            <label for="nom-empleado">Nombre</label>
            <input type="text" name="nom-empleado" class="form-control" id="nom-empleado">
          </div>
          <div class="form-group">
            <label for="email-empleado">Email</label>
            <input type="text" name="email-empleado" class="form-control" id="email-empleado">
          </div>
          <div class="form-group">
            <label for="password-empleado">Password</label>
            <input type="password" name="password-empleado" class="form-control" id="password-empleado">
          </div>
          <button type="submit" class="btn btn-dark">Registrar</button>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- modal -->