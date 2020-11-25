<?php

class Agencia extends Cliente{

    private $id;
    private $nit;
    private $razonSocial;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNit(){
        return $this->nit;
    }
    public function setNit($nit){
        $this->nit = $nit;
    }
    public function getRazonSocial(){
        return $this->razonSocial;
    }
    public function setRazonSocial($razonSocial){
        $this->razonSocial = $razonSocial;
    }
}