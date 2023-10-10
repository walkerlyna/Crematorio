<?php

namespace Controllers;

use Model\Servicio;
use MVC\Router;

class PanelAdminController {
    public static function index(Router $router) {
        session_start();

        isAdmin();

        $router->render('panel/indexAdmin', [
            'nombre' => $_SESSION['nombre']
        ]); 
    }
}