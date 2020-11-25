<h3 class="mt-2"><?= $data["titulo"]?></h3>
<table class="table table-striped">
    <thead class="thead-dark">
        <th>Fecha</th>
        <th>Fianza</th>
        <th>Marca</th>
        <th></th>    
        <th></th>     
    </thead>
    <?php foreach($data["listaVehiculos"] as $vehiculo){ ?>
    <tr>
        <td><?= ucfirst($vehiculo["fecha_entrega"]) ?></td>
        <td><?= ucfirst($vehiculo["fianza"]) ?></td>
        <td><?= $vehiculo["marca"]?></td>               
        <td>    
            <form action="<?=getUrlControllerMethod("alquiler", "cancelar")?>" method="POST"> 
                <input type="hidden" name="idvehiculo" value="<?= $vehiculo["idvehiculo"]?>">        
                <input type="hidden" name="idcontrato" value="<?= $vehiculo["idcontrato"]?>">
                <div class="pull-right">        
                <button type="submit" class="mb-3 btn btn-dark pull-right">Cancelar Reserva</button>
                </div>    
            </form>
        </td> 
        <td> 
        <form action="<?=getUrlControllerMethod("alquiler", "confirmar")?>" method="POST"> 
                <input type="hidden" name="idvehiculo" value="<?= $vehiculo["idvehiculo"]?>">  
                <button type="submit" class="mb-3 btn btn-dark" >Confirmar Alquiler</button>    
        </form>
        </td>    
    </tr>
    <?php } ?>
</table>
