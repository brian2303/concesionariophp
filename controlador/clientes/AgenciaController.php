<?php

class AgenciaController{
    
    private static $agencia;
    
    public function __construct(){
        self::$agencia = new AgenciaService();
    }
    
    public function listar(){
        $lista = self::$agencia->listar();
        Template::render(
            DIR_VIEW . "clientes/agencia/lista.php",
            ["titulo"=>"Agencias","lista"=>$lista]
        );
    }

    public function registrar(){
        $agencia = new Agencia();
        $agencia->setNit(filter_input(INPUT_POST,"nit"));
        $agencia->setRazonSocial(filter_input(INPUT_POST,"razon-social"));
        $agencia->setDireccion(filter_input(INPUT_POST,"domicilio"));
        $agencia->setTelefonos(filter_input(INPUT_POST,"telefono"));
        self::$agencia->registrar($agencia);

        $lista = self::$agencia->listar();
        Template::render(
            DIR_VIEW . "clientes/agencia/lista.php",
            ["titulo"=>"Agencias","lista"=>$lista]
        );
    }
}