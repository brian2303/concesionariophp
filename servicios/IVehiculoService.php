<?php
interface IVehiculoService{
    public function registrar($vehiculo,$tipoVehiculo,$attrPropio,$getAttr);
    public function listar($tipoVehiculo,$attr);
}