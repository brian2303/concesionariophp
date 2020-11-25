<?php

class Particular extends Cliente{

    private $id;
    private $nombre;
    private $apellido;
    private $cedula;


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;

    }
    public function getNombre(){
        return $this->nombre;

    }
    public function setNombre($nombre){
        $this->nombre = $nombre;

    }
    public function getApellido(){
        return $this->apellido;

    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
        
    }
    public function getCedula(){
        return $this->cedula;

    }
    public function setCedula($cedula){
        $this->cedula = $cedula;
        
    }




}