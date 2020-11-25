<?php
require_once("Vehiculo.php");

class Furgoneta extends Vehiculo{
    private $capacidadCarga;

    public function getCapacidadCarga(){
        return $this->capacidadCarga;
    }
    public function setCapacidadCarga($capacidadCarga){
        $this->capacidadCarga = $capacidadCarga;

    }
}