<?php

class ClienteService {

    private static $agencia;
    private static $particular;

    public function __construct(){
        self::$agencia = new AgenciaService();
        self::$particular = new ClienteParticularService();
    }
    
    public function listarClientes(){
        $listaTotalClientes = array_merge(self::$agencia->listar(),self::$particular->listarClientesParticulares());
        return $listaTotalClientes;
    }
    
}