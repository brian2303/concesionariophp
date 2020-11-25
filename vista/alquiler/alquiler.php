<div class="container-fluid mt-2">
        <div class="col-6">
            <h2><?= $data["titulo"]?></h2>
        </div>
        <form class="col-6" action="<?= getUrlControllerMethod('alquiler','registrar') ?>" method="POST">
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input id="fecha" class="form-control" name="fecha" type="text">
            </div>
            <div class="form-group">
                <label for="lugarEntrega">Lugar Entrega</label>
                <input id="lugarEntrega" class="form-control" name="lugarEntrega" type="text">
            </div>
            <div class="form-group">
            <label for="cliente">Cliente</label>
            <select name="cliente" class="custom-select">
                <?php foreach($data["listaclientes"] as $cliente){ ?>
                    <?php if(isset($cliente["nombre"])){?>
                        <option value="<?= $cliente["idCliente"] ?>"><?= $cliente["nombre"] ?> </option>
                    <?php }else{ ?>
                        <option value="<?= $cliente["idCliente"] ?>"><?= $cliente["razonSocial"] ?> </option>
                    <?php } ?>
                <?php } ?>
            </select>
            <div class="form-group">
                <label for="fianza">Fianza</label>
                <input id="fianza" class="form-control" type="text" name="fianza">
            </div>
            <div class="form-group">
            <label for="vehiculo">Seleccione el Vehiculo</label>
            <select name="vehiculo" class="custom-select">
                <?php foreach($data["listaVehiculos"] as $vehiculo){ ?>  <!-- Metodo Listar Cliente -->
                <option value="<?= $vehiculo["idvehiculo"] ?>"><?= $vehiculo["marca"] ?> </option>
                <?php } ?>
            </select>
            <div class="form-group">
            <label for="estado-alquiler">Seleccionar Estado</label>
            <select name="estado-alquiler" class="custom-select">
                <option value="4">Alquilar</option>
                <option value="3">Reservar</option>
            </select>
            </td>
            <br><br>
            <button type="submit" class="btn btn-dark">Registrar</button>
        </form>
</div>
