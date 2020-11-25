<h3 class="mt-2" ><?= $data["tituloPagina"] ?></h3>
<table class="table table-striped">
    <thead class="thead-dark">
        <th>Marca</th>
        <th>Tipo combustible</th>
        <th>Cantidad cilindros</th>
        <th>Volumen</th>
        <th><?= $data["titulo"] ?></th>
        <th>Opción</th>
    </thead>
    <?php foreach($data["lista"] as $vehiculo){ ?>
    <tr>
        <td><?= ucfirst($vehiculo["marca"]) ?></td>
        <td><?= $vehiculo["tipoCombustible"]?></td>
        <td><?= $vehiculo["cantCilindros"]?></td>
        <td><?= $vehiculo["volumen"]?></td>
        <td><?= $vehiculo[$data['attrPropio']]?></td>
        <td>
            <form action="<?= getUrlControllerMethod("vehiculo","vender") ?>" method="post">
                <input type="hidden" name="idvehiculo" value="<?=$vehiculo["idvehiculo"]?>">
                <input type="hidden" name="tipoVehiculo" value="<?=$data["tipoDeVehiculo"]?>">
                <button 
                    class="btn btn-outline-danger" 
                    type="submit" 
                    name="">Vender
                </button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>