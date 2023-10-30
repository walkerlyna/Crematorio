<?php

namespace Controllers;

use Model\Servicio;
use MVC\Router;

class InventarioController {
    public static function index(Router $router) {
        session_start();

        isAuth();

        $servicio = Servicio::all();

        $router->render('panel/inventario', [
            'servicio' => $servicio
        ]);
    }
}

