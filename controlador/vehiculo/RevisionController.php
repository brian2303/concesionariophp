<?php

class RevisionController{
    
    private static $vehiculo;
    private static $empleado;
    private static $reg_vehiculo;
    public function __construct(){
        self::$vehiculo = new VehiculoService(); 
        self::$empleado = new EmpleadoService();
        self::$reg_vehiculo = new RevisionService(); 
    }
    
    //listar
    public function pendientes(){

        $listaVehRev = self::$vehiculo->listarVehiculos(1);
        $listaEmpleados = self::$empleado->listarEmpl();
        Template::render(
            DIR_VIEW . "revisiones/lista.php",
            ["listavehrev"=>$listaVehRev,"listaempleados"=>$listaEmpleados,
            "titulo"=>"Lista Revisiones"
            ]

        );
    }

    public function regRevision(){
        $idEmp = filter_input(INPUT_POST,"empleado");
        $idVeh = filter_input(INPUT_POST,"idvehiculo");
        self::$reg_vehiculo->regRevision($idEmp,$idVeh);
        $listaVehRev = self::$vehiculo->listarVehiculos(1);
        $listaEmpleados = self::$empleado->listarEmpl();
        Template::render(
            DIR_VIEW . "revisiones/lista.php",
            ["listavehrev"=>$listaVehRev,"listaempleados"=>$listaEmpleados]
        );
    }





}