<?php
class ValidacionSesion {

    private function __construct(){}

    public static function validar($controlador, $metodo){
        if($controlador != "login" || $metodo != "ingresar"){
            if(!self::sessionIniciada()){
                header("Location: " . getUrlControllerMethod("login", "ingresar"));
                return false;
            }
        }
        return true;
    }

    public static function sessionIniciada(){
        //print_r(isset($_SESSION["user"])?'Si':'No');
        return isset($_SESSION["user"]) && $_SESSION["user"];//true o false
    }

    public static function getUser(){
        return unserialize($_SESSION["user"]);//true o false
    }

}