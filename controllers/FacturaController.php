<?php

namespace Controllers;

use Model\Pesos;
use Model\Pesos2;
use Model\Productos;
use Model\Productos2;
use MVC\Router;

class FacturaController {
    public static function index(Router $router) {
        session_start();

        isAdmin();

        $productos = Productos::all();
        $productos2 = Productos2::all();

        $pesos = Pesos::all();
        $pesos2 = Pesos2::all();

        $router->render('panel/facturas', [
            'productos' => $productos,
            'productos2' => $productos2,
            'pesos' => $pesos,
            'pesos2' => $pesos2
        ]);
    }
}