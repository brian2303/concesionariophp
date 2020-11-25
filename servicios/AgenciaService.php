<?php

class AgenciaService{
    public function listar(){
        $listaAgencias = [];
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare(
            "SELECT c.*,ca.nit,ca.razonSocial 
                FROM clientes c 
                INNER JOIN cli_agencias ca 
                ON c.idCliente = ca.idCliente;
            "
        );
        if($stm->execute()){
            while($fila = $stm->fetch(PDO::FETCH_ASSOC)){
                array_push($listaAgencias,$fila);
            }
        }
        return $listaAgencias;
    }

    public function registrar($agencia){
        
        $pdo = ConexionBD::getPDO();
        $pdo->beginTransaction();
        $stm = $pdo->prepare(
            "INSERT INTO clientes(domicilio,telefonos) VALUES (:domicilio,:telefono)"
        );
        $stm->bindValue(":domicilio",$agencia->getDireccion(),PDO::PARAM_STR);
        $stm->bindValue(":telefono",$agencia->getTelefonos(),PDO::PARAM_STR);
        $stm->execute();

        $lastId = $pdo->lastInsertId();
        $stm = $pdo->prepare(
            "INSERT INTO cli_agencias(nit,razonSocial,idCliente)
            VALUES (:nit,:razonSocial,:idCliente)"
        );
        $stm->bindValue(":nit",$agencia->getNit(),PDO::PARAM_STR);
        $stm->bindValue(":razonSocial",$agencia->getRazonSocial(),PDO::PARAM_STR);
        $stm->bindValue(":idCliente",$lastId,PDO::PARAM_INT);
        $stm->execute();
        $pdo->commit();
    }
}