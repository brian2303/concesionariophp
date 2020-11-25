<?php

class EmpleadoController{

    private static $empleado;
    private static $revision;
    
    public function __construct(){
        self::$empleado = new EmpleadoService();
        self::$revision = new RevisionService();
        // self::$reg_vehiculo = new RevisionService(); 
    }

    public function listar(){        
        $listaEmpleados = self::$empleado->listarEmpl();
        Template::render(
            DIR_VIEW . "empleados/lista.php",
            ["listaempleados"=>$listaEmpleados,
            "titulo"=>"Lista Empleados"]
        );
    }

    public function listRevEmpleados(){
        $mensaje = null;
        $idEmpleado = filter_input(INPUT_POST,"idEmpleado");
        $listaRevEmp = self::$revision->revisionPorEmpleado($idEmpleado);
        if(!$listaRevEmp){
            $mensaje = "No hay revisiones asociadas a este empleado";
        }
        $listaEmpleados = self::$empleado->listarEmpl();
        Template::render(
            DIR_VIEW . "empleados/lista.php",
            ["listaRevEmp"=>$listaRevEmp,
            "listaempleados"=>$listaEmpleados,
            "titulo"=>"Lista Empleados",
            "mensaje"=>$mensaje
            ]
        );
    }

    public function registrar(){       
        $empleado = new Empleado();
        $empleado->setNombres(filter_input(INPUT_POST,"nom-empleado"));
        $empleado->setEmail(filter_input(INPUT_POST,"email-empleado"));
        $empleado->setPassword(filter_input(INPUT_POST,"password-empleado"));
        self::$empleado->regEmpleado($empleado);
        $listaEmpleados = self::$empleado->listarEmpl();
        Template::render(
            DIR_VIEW . "empleados/lista.php",
            ["listaempleados"=>$listaEmpleados,
            "titulo"=>"Lista Empleados"
            ]
        );
    }

}