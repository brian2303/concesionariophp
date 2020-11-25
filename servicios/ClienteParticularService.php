<?php

class ClienteParticularService{
    public function listarClientesParticulares(){
        $listaClientesParticulares = [];
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare(
            "SELECT c.*,cp.cedula,cp.nombre,cp.apellidos 
                FROM clientes c 
                INNER JOIN cli_particulares cp 
                ON c.idCliente = cp.idCliente"
        );
        if($stm->execute()){
            while($fila = $stm->fetch(PDO::FETCH_ASSOC)){
                array_push($listaClientesParticulares,$fila);
            }
        }
        return $listaClientesParticulares;
    }

    public function registrar($clienteParticular){
        $pdo = ConexionBD::getPDO();
        $pdo->beginTransaction();
        $stm = $pdo->prepare(
            "INSERT INTO clientes(domicilio,telefonos) VALUES (:domicilio,:telefono)"
        );
        $stm->bindValue(":domicilio",$clienteParticular->getDireccion(),PDO::PARAM_STR);
        $stm->bindValue(":telefono",$clienteParticular->getTelefonos(),PDO::PARAM_STR);
        $stm->execute();
        $lastId = $pdo->lastInsertId();
        $stm = $pdo->prepare(
            "INSERT INTO cli_particulares (cedula,nombre,apellidos,idCliente)
            VALUES (:cedula,:nombre,:apellidos,:idCliente)"
        );
        $stm->bindValue(":cedula",$clienteParticular->getCedula(),PDO::PARAM_STR);
        $stm->bindValue(":nombre",$clienteParticular->getNombre(),PDO::PARAM_STR);
        $stm->bindValue(":apellidos",$clienteParticular->getApellido(),PDO::PARAM_STR);
        $stm->bindValue(":idCliente",$lastId,PDO::PARAM_INT);
        $stm->execute();
        $pdo->commit();
    }
}