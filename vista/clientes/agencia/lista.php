<h3 class="mt-3"><?= $data["titulo"]?></h3>
<table class="table table-striped">
    <thead class="thead-dark">
        <th>Nit</th>
        <th>Razón social</th>
        <th>Domicilio</th>
        <th>Telefonos</th>
    </thead>
    <?php foreach($data["lista"] as $agencia){ ?>
    <tr>
        <td><?= $agencia["nit"] ?></td>
        <td><?= $agencia["razonSocial"]?></td>
        <td><?= $agencia["domicilio"]?></td>
        <td><?= $agencia["telefonos"]?></td>
    </tr>
    <?php } ?>
</table>
<button data-toggle="modal" data-target="#reg-agencia" class="mb-3 btn btn-dark" >Nuevo Registro</button>
<?php include("registro.php") ?>