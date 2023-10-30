<?php

namespace Controllers;

use Model\Clientes;
use MVC\Router;

class ClienteAdminController
{
    public static function index(Router $router)
    {
        session_start();

        isAuth();

        $clientes = Clientes::all();

        $router->render('panel/clienteAdmin', [
            'clientes' => $clientes
        ]);
    }

    public static function actualizar3(Router $router)
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
                header('Location: /clientess');
            }
        }

        $router->render('clientes/actualizarClientesAdmin', [
            'clientes' => $clientes
        ]);
    }

    public static function eliminar3()
    {

        session_start();

        isAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id']; 
            $clientes = Clientes::find($id);
            $clientes->eliminar();
            header('Location: /clientess');
        }
    }
}
