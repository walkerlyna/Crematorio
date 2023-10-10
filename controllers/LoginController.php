<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router; 

class LoginController {
    public static function login(Router $router) {
        $alertas = [];

        $auth = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if(empty($alertas)) {
                //comprobar que exista el usuario
                $usuario = Usuario::where('email', $auth->email);
                
                if($usuario) {
                    // verificar la contraseña
                   if($usuario->comprobarPasswordAndVerificado($auth->password)) {
                        // autenticar el usuario
                        session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        // redireccionamiento

                        if($usuario->admin === "1") {
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /panel');
                        } else {
                            header('Location: /qwerty');
                        }
                   }
                } else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login',  [
            'alertas' => $alertas,
            'auth' => $auth
        ]);
    }

    public static function logout() {
        session_start();

        $_SESSION = [];

        header('Location: /');

    }
    public static function olvide(Router $router) {

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $auth->validarEmail();

            if(empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

                    if($usuario && $usuario->confirmado === "1") {
                        // generar token
                        $usuario->crearToken();
                        $usuario->guardar();

                        // enviar el email
                        $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                        $email->enviarInstrucciones();

                        //alerta de exito
                        Usuario::setAlerta('exito', 'Revisa tu email');
                        

                    } else {
                        Usuario::setAlerta('error', 'El usuario no existe o no está confirmado');
                    }
                }
            }
        

        $router->render('auth/olvide-password', [
            'alertas' => $alertas
        ]);
    }
    public static function recuperar(Router $router) {
        
        $alertas = [];
        $error = false;

        $token = s($_GET['token']);
        
        // buscar usuario por su token
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            Usuario::setAlerta('error', 'Token no válido');
            $error = true;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // leer el nuevo password

            $password = new Usuario($_POST);
            $alertas = $password->validarPassword();

            if(empty($alertas)) {
                $usuario->password = null;

                $usuario->password = $password->password;
                $usuario->hashPassword();
                $usuario->token = null;

                $resultado = $usuario->guardar();
                if($resultado) {
                    header('Location: /');
                }
            }
        }


        $alertas = Usuario::getAlertas();
        $router->render('auth/recuperar-password', [
            'alertas' => $alertas,
            'error' => $error
        ]);
    }
    public static function crear(Router $router) {
        
        $usuario = new Usuario($_POST);
        
        // ALERTAS VACIAS
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta(); 

            //revisar que alertas este vacio
            if(empty($alertas)) {
                // verificar que el usuario no esté registrado
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    //hashear el password
                    $usuario->hashPassword();

                    //generar token único
                    $usuario->crearToken();

                    //enviar el email
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarConfirmacion();

                    //crear el usuario
                    $resultado = $usuario->guardar();
                    if($resultado) {
                        header('Location: /mensaje');
                    }

                    

                    
                }
            }
        }
        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas                   
        ]);
    }
    public static function mensaje(Router $router) {

        $router->render('auth/mensaje');
    }
    public static function confirmar(Router $router) {
        $alertas = [];
        
        $token = s($_GET['token']);

        $usuario = Usuario::where('token', $token); 
        
        if(empty($usuario)) {
            // Mostrar mensaje de error
            Usuario::setAlerta('error', 'Token no válido');
        } else {
            // Modificar a usuario confirmado
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta comprobada correctamente');
        }

        // obtener alertas
        $alertas = Usuario::getAlertas();

        // renderizar la vista
        $router->render('auth/confirmar-cuenta', [
            'alertas' => $alertas 
        ]);
    }
    
}
