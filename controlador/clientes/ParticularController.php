<?php

class ParticularController{
    
    private static $clientesParticulares;
    
    public function __construct(){
        self::$clientesParticulares = new ClienteParticularService();
    }
    
    public function listar(){
        $lista = self::$clientesParticulares->listarClientesParticulares();
        Template::render(
            DIR_VIEW . "clientes/particular/lista.php",
            ["titulo"=>"Clientes particulares","lista"=>$lista]
        );
    }

    public function registrar(){
        $clienteParticular = new Particular();
        $clienteParticular->setCedula(filter_input(INPUT_POST,"cedula"));
        $clienteParticular->setNombre(filter_input(INPUT_POST,"nombre"));
        $clienteParticular->setApellido(filter_input(INPUT_POST,"apellido"));
        $clienteParticular->setDireccion(filter_input(INPUT_POST,"domicilio"));
        $clienteParticular->setTelefonos(filter_input(INPUT_POST,"telefono"));
        self::$clientesParticulares->registrar($clienteParticular);

        $lista = self::$clientesParticulares->listarClientesParticulares();
        Template::render(
            DIR_VIEW . "clientes/particular/lista.php",
            ["titulo"=>"Clientes particulares","lista"=>$lista]
        );
    }
}