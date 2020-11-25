<?php

class Contrato{

    private $id;
    private $fechaEntrega;
    private $fechaDevolucion;
    private $lugarEntrega;
    private $lugarDevolucion;
    private $fianza;
    private $saldo;

    public function getId(){
        return $this->id;
    }

    public function getFechaEntrega(){
        return $this->fechaEntrega;
    }

    public function getFechaDevolucion(){
        return $this->fechaDevolucion;
    }

    public function getLugarEntrega(){
        return $this->lugarEntrega;
    }

    public function getLugarDevolucion(){
        return $this->lugarDevolucion;
    }

    

    public function getFianza(){
        return $this->fianza;
    }

    public function getSaldo(){
        return $this->saldo;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function setFechaEntrega($fechaEntrega){
        $this->fechaEntrega = $fechaEntrega;
    }

    public function setFechaDevolucion($fechaDevolucion){
        $this->fechaDevolucion = $fechaDevolucion;
    }

    public function setLugarEntrega($lugarEntrega){
        $this->lugarEntrega = $lugarEntrega;
    }

    public function setLugarDevolucion($lugarDevolucion){
        $this->lugarDevolucion = $lugarDevolucion;
    }



    public function setFianza($fianza){
        $this->fianza = $fianza;
    }

    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }
}