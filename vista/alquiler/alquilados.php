<h3 class="mt-2"><?= $data["titulo"]?></h3>
<table class="table table-striped">
    <thead class="thead-dark">
        <th>Fecha Entrega</th>
        <th>Fianza</th>
        <th>Marca</th>        
        <th>Estado</th>        
    </thead>
    <?php foreach($data["listaVehiculos"] as $vehiculo){ ?>
    <tr>
        <td><?= ucfirst($vehiculo["fecha_entrega"]) ?></td>
        <td><?= ucfirst($vehiculo["fianza"]) ?></td>
        <td><?= $vehiculo["marca"]?></td>                
        <td>
            <button data-toggle="modal" data-target="#reg-devolucion<?= $vehiculo["idcontrato"]?>" class="mb-3 btn btn-dark" >Registrar Devolución</button>
            <div class="modal fade" id="reg-devolucion<?= $vehiculo["idcontrato"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Devolución <i class="fa fa-user-plus"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= getUrlControllerMethod("alquiler","devolucion")?>" method="POST">
                        <input type="hidden" name="id-vehiculo" value="<?= $vehiculo["idvehiculo"]?>">
                        <input type="hidden" name="id-contrato" value="<?= $vehiculo["idcontrato"]?>">
                        <div class="form-group">
                            <label for="fecha">Fecha Devolución</label>
                            <input type="text" name="fecha-devolucion" class="form-control" id="fecha-devolucion">
                        </div>
                        <div class="form-group">
                            <label for="lugarDevolucion">Lugar Devolución</label>
                            <input type="text" name="lugar-devolucion" class="form-control" id="lugarDevolucion">
                        </div>
                        <div class="form-group">
                            <label for="saldo">Saldo</label>
                            <input type="text" name="saldo" class="form-control" id="saldo">
                        </div>          
                        <button type="submit" class="btn btn-dark">Registrar</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </td>
    </tr>
    <?php } ?>
</table>

