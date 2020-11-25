<?php

class VehiculoService implements IVehiculoService{

    public function registrar($vehiculo,$tipoVehiculo,$attrPropio,$getAttr){
        $pdo = ConexionBD::getPDO();
        $pdo->beginTransaction();
        $stm = $pdo->prepare(
            "INSERT INTO vehiculo(volumen,tipoCombustible,cantCilindros,estado,marca)
            VALUES (:volumen, :tipoCombustible, :cantCilindros,:estado,:marca)"
        );
        $stm->bindValue(":volumen",$vehiculo->getVolumen(),PDO::PARAM_INT);
        $stm->bindValue(":tipoCombustible",$vehiculo->getTipoCombustible(),PDO::PARAM_STR);
        $stm->bindValue(":cantCilindros",$vehiculo->getCantidadCilindros(),PDO::PARAM_INT);
        $stm->bindValue(":estado",$vehiculo->getEstado(),PDO::PARAM_INT);
        $stm->bindValue(":marca",$vehiculo->getMarca(),PDO::PARAM_STR);

        $stm->execute();

        $lastId = $pdo->lastInsertId();
        $stm = $pdo->prepare(
            "INSERT INTO $tipoVehiculo($attrPropio,idvehiculo)
            VALUES (:$attrPropio,:idVehiculo)"
        );

        $stm->bindValue(":$attrPropio",$vehiculo->$getAttr(),PDO::PARAM_INT);
        $stm->bindValue(":idVehiculo",$lastId,PDO::PARAM_INT);
        $stm->execute();
        $pdo->commit();
    }

    public function listar($tipoVehiculo,$attr){
        $listaVehiculos = [];
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare(
            "SELECT vehiculo.marca,
                vehiculo.idvehiculo,
                vehiculo.tipoCombustible,
                vehiculo.cantCilindros,
                vehiculo.volumen,
                $tipoVehiculo.$attr
            FROM vehiculo 
            INNER JOIN $tipoVehiculo ON vehiculo.idvehiculo = $tipoVehiculo.idvehiculo
            WHERE vehiculo.estado NOT IN (5)"
        );
        if($stm->execute()){
            while($fila = $stm->fetch(PDO::FETCH_ASSOC)){
                array_push($listaVehiculos,$fila);
            }
        }
        return $listaVehiculos;
    }

    public function listarVehiculos($estado){
        $listaVehiculos = [];
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare(
            "SELECT * FROM vehiculo WHERE estado = :estado"
        );

        $stm->bindValue(":estado",$estado,PDO::PARAM_INT);
        if($stm->execute()){
            while($fila = $stm->fetch(PDO::FETCH_ASSOC)){
                array_push($listaVehiculos,$fila);
            }
        }
        return $listaVehiculos;
    }

    public function ventaVehiculo($idVehiculo){
        $pdo = ConexionBD::getPDO();
        $stm = $pdo->prepare(
            "UPDATE vehiculo SET estado = 5 WHERE idvehiculo = :idvehiculo"
        );
        $stm->bindValue(":idvehiculo",$idVehiculo,PDO::PARAM_INT);
        $stm->execute();
    }
}
