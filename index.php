<?php
require("config/init.php");

$nombreDelControlador = $_GET["controller"];
$nombreDelMetodo = $_GET["method"];

if($nombreDelControlador){
    if(ValidacionSesion::validar($nombreDelControlador, $nombreDelMetodo)){
        $nombreDelControlador = ucfirst($nombreDelControlador);
        $nombreDelControlador .= "Controller";
        $controller = new $nombreDelControlador();
        $controller->$nombreDelMetodo();
    }
}