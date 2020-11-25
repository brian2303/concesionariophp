<?php

class AlquilerController{

    private static $cliente;
    private static $vehiculos;
    private static $alquiler;

    public function __construct(){
        self::$cliente = new ClienteService();
        self::$vehiculos = new VehiculoService();
        self::$alquiler = new AlquilerService();
    }
    
    public function registro(){
        $listaClientes = self::$cliente->listarClientes();
        $listaVehiculos = self::$vehiculos->listarVehiculos(2);
        Template::render(
            DIR_VIEW . "alquiler/alquiler.php", 
            ["listaVehiculos"=>$listaVehiculos,
            "listaclientes"=>$listaClientes,
            "titulo"=>"Alquiler Vehiculo"]
        );
    }

    public function registrar(){
        $contrato = new Contrato();
        $contrato->setFechaEntrega(filter_input(INPUT_POST,"fecha"));
        $contrato->setLugarEntrega(filter_input(INPUT_POST,"lugarEntrega"));
        $contrato->setFianza(filter_input(INPUT_POST,"fianza"));
        $idCliente = filter_input(INPUT_POST,"cliente");
        $idVehiculo = filter_input(INPUT_POST,"vehiculo");
        $estado = filter_input(INPUT_POST,"estado-alquiler"); 
        self::$alquiler->regAlquiler($contrato,$idCliente,$idVehiculo,$estado);
        $listaVehiculos = self::$alquiler->listarVehiculosAlquilados(4);
        Template::render(
            DIR_VIEW . "alquiler/alquilados.php", 
            ["listaVehiculos"=>$listaVehiculos,
            "titulo"=>"Alquiler Vehiculo"]
            
        );
    }   

    public function listar(){
        $listaVehiculos;
        $listaVehiculos = self::$alquiler->listarVehiculosAlquilados(4);
        $titulo = "Vehículos Alquilados";
        Template::render(
            DIR_VIEW . "alquiler/alquilados.php", 
            ["listaVehiculos"=>$listaVehiculos,            
            "titulo"=>$titulo]
        );
    }

    public function listareserva(){
        $listaVehiculos = self::$alquiler->listarVehiculosAlquilados(3);
        $titulo = "Vehículos Reservados";
        Template::render(
            DIR_VIEW . "alquiler/reservados.php", 
            ["listaVehiculos"=>$listaVehiculos,            
            "titulo"=>$titulo]
        );
    }

    public function devolucion(){
        $contrato = new Contrato();
        $contrato->setFechaDevolucion(filter_input(INPUT_POST,"fecha-devolucion"));
        $contrato->setLugarDevolucion(filter_input(INPUT_POST,"lugar-devolucion"));
        $contrato->setSaldo(filter_input(INPUT_POST,"saldo"));
        $contrato->setId(filter_input(INPUT_POST,"id-contrato"));  
        $idVehiculo = filter_input(INPUT_POST,"id-vehiculo");
        self::$alquiler->devolucionVehiculo($contrato,$idVehiculo);
        $listaVehiculos = self::$alquiler->listarVehiculosAlquilados(4);
        Template::render(
            DIR_VIEW . "alquiler/alquilados.php", 
            ["listaVehiculos"=>$listaVehiculos,
            "titulo"=>"Alquiler Vehiculo"]
            
        );  
    }

    public function cancelar(){
        $idVehiculo = filter_input(INPUT_POST,"idvehiculo");
        $idContrato = filter_input(INPUT_POST,"idcontrato");
        self::$alquiler->cancelarReserva($idVehiculo,$idContrato);
        $listaVehiculos = self::$alquiler->listarVehiculosAlquilados(3);
        Template::render(
            DIR_VIEW . "alquiler/reservados.php", 
            ["listaVehiculos"=>$listaVehiculos,
            "titulo"=>"Vehiculos Reservados"]            
        );  
        

    }

    public function confirmar(){
        $idVehiculo = filter_input(INPUT_POST,"idvehiculo");
        self::$alquiler->confirmarAlquiler($idVehiculo);
        $listaVehiculos = self::$alquiler->listarVehiculosAlquilados(3);
        Template::render(
            DIR_VIEW . "alquiler/reservados.php", 
            ["listaVehiculos"=>$listaVehiculos,
            "titulo"=>"Vehiculos Reservados"]
            
        );  
    }

}