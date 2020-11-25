<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= $data["titulo"] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= getResource("css/style.css")?>">
</head>
<body>

<?php if(isset($_SESSION["user"])){?>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><i class="fa fa-car"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Clientes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= getUrlControllerMethod("particular","listar") ?>">
                Particulares <i class="fa fa-user"></i>
                </a>
                <a class="dropdown-item" href="<?= getUrlControllerMethod("agencia","listar") ?>">Agencias
                <i class="fa fa-users"></i>
                </a>
            </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=getUrlControllerMethod('empleado', 'listar') ?>">Empleados</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=getUrlControllerMethod('revision', 'pendientes') ?>">Revisiones</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Vehiculos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= getUrlControllerMethod('alquiler','registro')?>">Registrar Alquiler</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= getUrlControllerMethod("alquiler","listar") ?>">Alquilados</a>
            <a href="<?= getUrlControllerMethod("alquiler","listareserva") ?>" class="dropdown-item" type="submit" >Reservados</a>
        </div>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Flota
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= getUrlControllerMethod('vehiculo','registro')?>">Registrar Compra</a>
            <div class="dropdown-divider"></div>
            <form action="<?= getUrlControllerMethod("vehiculo","listar") ?>" method="POST">
                <button name="van" type="submit" class="dropdown-item">Van</button>
                <input type="hidden" name="action" value="van">
            </form>
            <form action="<?= getUrlControllerMethod("vehiculo","listar") ?>" method="POST">
                <button name="automovil" type="submit" class="dropdown-item" href="#">Automovil</a>
                <input type="hidden" name="action" value="automovil">
            </form>
            <form action="<?= getUrlControllerMethod("vehiculo","listar") ?>" method="POST">
                <button name="furgoneta" type="submit" class="dropdown-item" href="#">Furgoneta</a>
                <input type="hidden" name="action" value="furgoneta">
            </form>
        </div>
        </li>
        <li class="nav-item dropdown" style="padding-left:450px; margin-top:5px">
            <strong style="color:white" >Bienvenido <?= ucfirst($_SESSION["user"]["nombre"])?></strong>
            <a style="margin-left:30px;" href="<?=getUrlControllerMethod("login","salir")?>" class="btn btn-sm btn-info">Cerrar Sesión</a>
        </li>
    </ul>
    </div>
</nav>
</header>
<?php }?>
