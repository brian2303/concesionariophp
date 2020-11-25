<?php

require_once("Vehiculo.php");

class Van  extends Vehiculo {
    
    private $cantidadPasajeros;

    public function getCantidadPasajeros(){
        return $this->cantidadPasajeros;
    }

    public function setCantidadPasajeros($cantidadPasajeros){
        $this->cantidadPasajeros = $cantidadPasajeros;
    }
}