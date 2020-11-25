<?php

class EmpleadoService{

    public function listarEmpl(){
        $listaEmpleados = [];
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare(
            "SELECT * FROM empleados"
        );
        if($stm->execute()){
            while($fila = $stm->fetch(PDO::FETCH_ASSOC)){
                array_push($listaEmpleados,$fila);
            }
        }
        return $listaEmpleados;
    }

    public function regEmpleado($empleado){
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare(
            "INSERT INTO empleados (nombre,email,password) VALUES (:nombre,:email,MD5(:password))"
        );        
        $stm->bindValue(":nombre",$empleado->getNombres(),PDO::PARAM_STR);
        $stm->bindValue(":email",$empleado->getEmail(),PDO::PARAM_STR);
        $stm->bindValue(":password",$empleado->getPassword(),PDO::PARAM_STR);
        $stm->execute();
    }

    public function consultarLogin($email,$password){
        $empleado = null;
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare(
            "SELECT * FROM empleados WHERE email = :email AND password = :password"
        );
        $stm->bindValue(":email",$email,PDO::PARAM_STR);
        $stm->bindValue(":password",$password,PDO::PARAM_STR);
        if($stm->execute()){
            if($fila = $stm->fetch(PDO::FETCH_ASSOC)){
                $empleado = $fila;
            }
        } else{
            print_r($stm->errorInfo());
        }

        return $empleado;
    }
}