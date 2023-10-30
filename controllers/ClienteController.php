<?php

namespace Controllers;

use Model\Clientes;
use MVC\Router;

class ClienteController
{
    public static function index(Router $router)
    {
        session_start();

        isAuth();

        $clientes = Clientes::all();

        $router->render('panel/cliente', [
            'clientes' => $clientes
        ]);
    }

    public static function actualizar2(Router $router)
    {

        session_start();

        isAuth();

        if (!is_numeric(($_GET['id']))) return;
        $clientes = Clientes::find($_GET['id']);
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $clientes->sincronizar($_POST);

            $alertas = $clientes->validar();
            if (empty($alertas)) {


                $clientes->guardar();
                header('Location: /clientes');
            }
        }

        $router->render('clientes/actualizarClientes', [
            'clientes' => $clientes
        ]);
    }

    public static function eliminar2()
    {

        session_start();

        isAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $clientes = Clientes::find($id);
            $clientes->eliminar();
            header('Location: /clientes');
        }
    }
}
