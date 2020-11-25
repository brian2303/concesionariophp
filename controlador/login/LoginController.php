<?php
class LoginController {

    private static $empleadoService;


    public function __construct(){
        self::$empleadoService = new EmpleadoService();
    }

    public function ingresar() {
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $mensaje = null;
        if($email && $password){
            $usuario = self::$empleadoService->consultarLogin($email, $password);
            if($usuario){
                $_SESSION["user"] = $usuario;
                header("Location: " . getUrlControllerMethod("vehiculo","registro"));
                return;
            }
            $mensaje = "email o contraseña incorrecta";
        }

        Template::renderLogin(
            DIR_VIEW . "login/formlogin.php",
            ["titulo"=>"Login", "mensaje"=>$mensaje]
        );
    }

    public function salir() {
        session_destroy();
        header("Location: " . getUrlControllerMethod("login","ingresar"));
    }

}