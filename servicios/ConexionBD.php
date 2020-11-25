<?php

class ConexionBD {

    private static $pdo;

    private function ConexionBD(){

    }

    public static function getPDO(){
        if(!self::$pdo){
            self::$pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=concesionario","root","Admin1234*");
        }
        return self::$pdo;
    }

}