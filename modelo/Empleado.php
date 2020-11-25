<?php

class Empleado{
    
    private $identificacion;
    private $nombres;
    private $email;
    private $password;

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    
    public function getIdentificacion(){
        return $this->identificacion;
    }
    
    public function getNombres(){
        return $this->nombres;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }

    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function setPassword($password){
        $this->password = $password;
    }
    
}