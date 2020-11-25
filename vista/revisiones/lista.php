<h3 class="mt-2">Revisiones pendientes</h3>
<table class="table table-striped">
    <thead class="thead-dark">
        <th>Marca</th>
        <th>Tipo combustible</th>
        <th>Cantidad cilindros</th>
        <th>Volumen</th>
        <th>Empleado</th>
        <th>Estado</th>
    </thead>
    <?php foreach($data["listavehrev"] as $vehiculo){ ?>
    <tr>
    <td><?= ucfirst($vehiculo["marca"]) ?></td>
        <td><?= ucfirst($vehiculo["tipoCombustible"]) ?></td>
        <td><?= $vehiculo["cantCilindros"]?></td>
        <td><?= $vehiculo["volumen"]?></td>        
        <form action="<?=getUrlControllerMethod("revision", "regRevision")?>" method="POST"> 
        <input type="hidden" name="idvehiculo" value="<?= $vehiculo["idvehiculo"]?>">
        <td>
            <select name="empleado" class="custom-select">
                <?php foreach($data["listaempleados"] as $empleado){ ?>
                <option value="<?= $empleado["idempleados"] ?>"><?= $empleado["nombre"] ?> </option>
                <?php } ?>
            </select>
        </td>
        <td>
            <button class="btn btn-dark" type="submit">Aceptar Revisión</button>
        </td>
        </form>
    </tr>
    <?php } ?>
</table>
