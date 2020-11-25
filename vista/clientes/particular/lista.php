<h3 class="mt-3"><?= $data["titulo"]?></h3>
<table class="table table-striped">
    <thead class="thead-dark">
        <th>Cedula</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Domicilio</th>
        <th>Telefonos</th>
    </thead>
    <?php foreach($data["lista"] as $cliente){ ?>
    <tr>
        <td><?= $cliente["cedula"] ?></td>
        <td><?= $cliente["nombre"]?></td>
        <td><?= $cliente["apellidos"]?></td>
        <td><?= $cliente["domicilio"]?></td>
        <td><?= $cliente["telefonos"]?></td>
    </tr>
    <?php } ?>
</table>
<button data-toggle="modal" data-target="#reg-cliente" class="mb-3 btn btn-dark" >Nuevo Registro</button>
<?php include("registro.php") ?>