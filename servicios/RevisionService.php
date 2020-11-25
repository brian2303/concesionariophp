<?php

class RevisionService{


    public function regRevision($idEmpleado,$idVehiculo){
        $pdo = ConexionBD::getPDO();
        $pdo->beginTransaction();
        $stm = $pdo->prepare(
            "INSERT INTO revisiones (idempleados) VALUES (:idEmpleado)"
        );
        $stm->bindValue(":idEmpleado",$idEmpleado,PDO::PARAM_INT);

        $stm->execute();
        
        $stm = $pdo->prepare(
            "UPDATE vehiculo SET estado = 2 WHERE idvehiculo = :idVehiculo"
        );
        $stm->bindValue(":idVehiculo",$idVehiculo,PDO::PARAM_INT);
        $stm->execute();
        $pdo->commit();

    }

    public function revisionPorEmpleado($idEmpleado){
        $listaRevEmp = [];
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare(
            "SELECT * FROM revisiones WHERE idempleados = :idempleado"
        );
        $stm->bindValue(":idempleado",$idEmpleado,PDO::PARAM_INT);
        $stm->execute();
        if($stm->execute()){
            while($fila = $stm->fetch(PDO::FETCH_ASSOC)){
                array_push($listaRevEmp,$fila);
            }
        }
        return $listaRevEmp;
    }

}
