<div class="container">
  <h2 class="mt-5">LOGIN CONCESIONARIO</h2>
  <div class="row">
    <div class="col">
      <form action="<?=getUrlControllerMethod("login","ingresar") ?>" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" name="email">
          <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu email con alguien mas.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Contraseña</label>
          <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-outline-primary">Ingresar</button>
      </form>
    </div>
  </div>
<p style="color:red" ><?= $data["mensaje"]?></p>
</div>