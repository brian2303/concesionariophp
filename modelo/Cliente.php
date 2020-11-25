<?php

 class Cliente{

    private $id;
    private $direccion;
    private $telefonos;


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getTelefonos(){
        return $this->telefonos;
    }
    public function setTelefonos($telefonos){
        $this->telefonos = $telefonos;

    }




}