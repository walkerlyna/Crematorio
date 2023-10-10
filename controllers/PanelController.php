<?php

namespace Controllers;

use MVC\Router;

class PanelController {
    public static function index(Router $router) {
        session_start();

        isAdmin();

        $router->render('panel/index', [
            'nombre' => $_SESSION['nombre']
        ]); 
    }
}