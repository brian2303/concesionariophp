<?php

class AlquilerService{
    
    public function regAlquiler($contrato,$idCliente,$idVehiculo,$estado){
        $pdo = ConexionBD::getPDO();
        $pdo->beginTransaction();
        $stm = $pdo->prepare(
            "INSERT INTO contrato(fecha_entrega,lugar_entrega,fianza, idCliente, idvehiculo)
            VALUES (:fecha_entrega, :lugar_entrega, :fianza, :idCliente, :idvehiculo)"
        );
        $stm->bindValue(":fecha_entrega",$contrato->getFechaEntrega(),PDO::PARAM_STR);
        $stm->bindValue(":lugar_entrega",$contrato->getLugarEntrega(),PDO::PARAM_STR);
        $stm->bindValue(":fianza",$contrato->getFianza(),PDO::PARAM_INT);
        $stm->bindValue(":idCliente",$idCliente,PDO::PARAM_STR);
        $stm->bindValue(":idvehiculo",$idVehiculo,PDO::PARAM_INT);

        $stm->execute();
        $stm = $pdo->prepare(
            "UPDATE vehiculo SET estado = :estado WHERE idvehiculo = :idVehiculo"
        );

        $stm->bindValue(":estado",$estado,PDO::PARAM_INT);
        $stm->bindValue(":idVehiculo",$idVehiculo,PDO::PARAM_INT);
        $stm->execute();
        $pdo->commit();
    }


    public function listarVehiculosAlquilados($estado){
        $listaVehiculosAlq = [];
        $pdo = ConexionBD::getPDO();
        $pdo->beginTransaction();
        $stm = $pdo->prepare(
            "SELECT c.idcontrato,c.fecha_entrega,c.fianza,ve.marca,ve.estado,ve.idvehiculo
            FROM contrato c 
            INNER JOIN vehiculo ve 
            ON c.idvehiculo = ve.idvehiculo 
            WHERE ve.estado = :estado;"
        );
        $stm->bindValue(":estado",$estado,PDO::PARAM_INT);
        if($stm->execute()){
            while($fila = $stm->fetch(PDO::FETCH_ASSOC)){
                array_push($listaVehiculosAlq,$fila);
            }
        }
        return $listaVehiculosAlq;
    }

    public function devolucionVehiculo($contrato,$idVehiculo){
        $pdo = ConexionBD::getPDO();
        $pdo->beginTransaction();
        $stm = $pdo->prepare(
            "UPDATE contrato SET fecha_devolucion = :fecha_devolucion,
            lugar_devolucion = :lugar_devolucion,
            saldo = :saldo
            WHERE idcontrato = :idcontrato"
        );
        $stm->bindValue(":fecha_devolucion",$contrato->getFechaDevolucion(),PDO::PARAM_STR);
        $stm->bindValue(":lugar_devolucion",$contrato->getLugarDevolucion(),PDO::PARAM_STR);
        $stm->bindValue(":idcontrato",$contrato->getId(),PDO::PARAM_INT);
        $stm->bindValue(":saldo",$contrato->getSaldo(),PDO::PARAM_INT);
        $stm->execute();
        $stm = $pdo->prepare(
            "UPDATE vehiculo SET estado = 1 WHERE idvehiculo = :idVehiculo"
        );
        $stm->bindValue(":idVehiculo",$idVehiculo,PDO::PARAM_INT);
        $stm->execute();
        $pdo->commit();
    }

    public function cancelarReserva($idVehiculo,$idContrato){
        $pdo = ConexionBD::getPDO();
        $pdo->beginTransaction();
        $stm = $pdo->prepare(
            "UPDATE vehiculo SET estado = 2 WHERE idvehiculo = :idVehiculo"
        );
        $stm->bindValue(":idVehiculo",$idVehiculo,PDO::PARAM_INT);
        $stm->execute();
        $stm = $pdo->prepare(
            "DELETE FROM contrato WHERE idcontrato = :idcontrato"
        );
        $stm->bindValue(":idcontrato",$idContrato,PDO::PARAM_INT);
        $stm->execute();
        $pdo->commit();
    }

    public function confirmarAlquiler($idVehiculo){
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare(
            "UPDATE vehiculo SET estado = 4 WHERE idvehiculo = :idVehiculo"
        );
        $stm->bindValue(":idVehiculo",$idVehiculo,PDO::PARAM_INT);
        $stm->execute();
    }
}
