<h3 class="mt-2">Lista de Empleados</h3>
<table class="table table-striped">
    <thead class="thead-dark">
        <th>Id Number</th>
        <th>Nombre</th>
        <th>Revisiones</th>
    </thead>
    <?php foreach($data["listaempleados"] as $empleado){ ?>
    <tr>
        <td><?= $empleado["idempleados"] ?></td>
        <td><?= $empleado["nombre"]?></td>
        <td>
            <form action="<?= getUrlControllerMethod("empleado","listRevEmpleados")?>" method="POST">
                <input type="hidden" name="idEmpleado" value="<?= $empleado["idempleados"] ?>">
                <button class="btn btn-dark" data-toggle="modal" data-target="#revisiones">Revisiones</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
<button class="btn btn-dark" type="submit" data-toggle="modal" data-target="#regEmpleado">Registrar Empleado</button>     
<hr>
<?php if(isset($data["listaRevEmp"]) && $data["listaRevEmp"] != null ){ ?>
<table class="table table-striped">
    <thead class="thead-dark">
        <th>Id Revisión</th>
        <th>Fecha</th>
    </thead>
    <?php foreach($data["listaRevEmp"] as $empleado){ ?>
        <tr>
            <td><?= $empleado["idrevisiones"] ?></td>
            <td><?= $empleado["fecha"]?></td>
        </tr>
    <?php } ?>
<?php } ?>
</table>
<?php if(isset($data["mensaje"])){ ?>
<p><?= $data["mensaje"] ?></p>
<?php } 
include("registro.php");
?>