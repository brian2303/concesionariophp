<?php

require_once("Vehiculo.php");

class Automovil extends Vehiculo{

    private $cantidadPuertas;

    public function getCantidadPuertas(){
        return $this->cantidadPuertas;
    }

    public function setCantidadPuertas($cantidadPuertas){
        $this->cantidadPuertas = $cantidadPuertas;
    }

}

?>