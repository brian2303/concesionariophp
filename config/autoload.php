<?php

function autoload($nombreClase){
    $rutaArchivo = "";
    $rutas = [
        DIR_CONTROLLER,
        DIR_CONTROLLER_VEHICULO,
        DIR_CONTROLLER_EMPLEADOS,
        DIR_CONTROLLER_LOGIN,
        DIR_CONTROLLER_CLIENTES,
        DIR_CONTROLLER_ALQUILER,
        DIR_MODEL,
        DIR_VIEW,
        DIR_SERVICE
    ];
    foreach ($rutas as $ruta) {
        $rutaArchivo = $ruta . $nombreClase . ".php";
        if (file_exists($rutaArchivo)) {
            require_once($rutaArchivo);
            break;
        }
    }
}

spl_autoload_register("autoload");