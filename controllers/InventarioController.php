<?php

namespace Controllers;


use MVC\Router;

class InventarioController {
    public static function index(Router $router) {
        session_start();

        isAuth();


        $router->render('panel/defunciones', [
            
        ]);
    }
}