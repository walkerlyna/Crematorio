<?php

namespace Controllers;

use Model\Productos;
use Model\Servicio;
use Model\Usuario;
use MVC\Router;

class DefuncionController
{
    public static function index(Router $router)
    {
        session_start();

        isAuth();

        $servicio = Servicio::all();
        $productos = Productos::all();

        $router->render('panel/defunciones', [
            'servicio' => $servicio,
            'productos' => $productos

        ]);
    }

    



    public static function actualizar(Router $router)
    {
        session_start();
        isAuth();

        if (!is_numeric($_GET['id'])) return;
        $servicio = Servicio::find($_GET['id']);
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicioData = $_POST;
            $servicio->sincronizar($_POST);
            $alertas = $servicio->validar();

            if (empty($alertas)) {
                // Manejar el archivo 'archivo'
                if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
                    $rutaTemporal = $_FILES['archivo']['tmp_name'];
                    $nombreOriginal = $_FILES['archivo']['name'];



                    // Directorio base donde se guardarán los archivos
                    $directorioBase = '../public/autorizacion/';

                    // Directorio específico para la fecha actual
                    $directorioFecha = $directorioBase;

                    // Elimina el archivo existente si existe


                    // Obtén la fecha actual en el formato deseado (por ejemplo, "YYYY-MM-DD")



                    $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
                    // Generar el nombre del archivo usando la fecha actual y un nombre único (por ejemplo, una marca de tiempo)
                    $nombreArchivo = $servicioData['cliente'] . '-' . $servicioData['nombre'] . '_' . uniqid() . '.' . $extension;

                    // Definir la ruta de destino para el archivo
                    $rutaDestino = $directorioFecha . $nombreArchivo;

                    // Mover el archivo a la ubicación de destino
                    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                        // Actualizar el nombre del archivo en la base de datos
                        $servicio->autorizacion = $nombreArchivo;
                    }
                }

                if (isset($_FILES['archivo2']) && $_FILES['archivo2']['error'] === UPLOAD_ERR_OK) {
                    $rutaTemporal = $_FILES['archivo2']['tmp_name'];
                    $nombreOriginal = $_FILES['archivo2']['name'];



                    // Directorio base donde se guardarán los archivos
                    $directorioBase = '../public/evidencia/';

                    // Directorio específico para la fecha actual
                    $directorioFecha = $directorioBase;

                    // Elimina el archivo existente si existe


                    // Obtén la fecha actual en el formato deseado (por ejemplo, "YYYY-MM-DD")


                    // Crea el directorio si no existe

                    $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
                    // Generar el nombre del archivo usando la fecha actual y un nombre único (por ejemplo, una marca de tiempo)
                    $nombreArchivo = $servicioData['cliente'] . '-' . $servicioData['nombre'] . '_' . uniqid() . '.' . $extension;

                    // Definir la ruta de destino para el archivo
                    $rutaDestino = $directorioFecha . $nombreArchivo;

                    // Mover el archivo a la ubicación de destino
                    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                        // Actualizar el nombre del archivo en la base de datos
                        $servicio->evidencia = $nombreArchivo;
                    }
                }

                if (isset($_FILES['archivo3']) && $_FILES['archivo3']['error'] === UPLOAD_ERR_OK) {
                    $rutaTemporal = $_FILES['archivo3']['tmp_name'];
                    $nombreOriginal = $_FILES['archivo3']['name'];



                    // Directorio base donde se guardarán los archivos
                    $directorioBase = '../public/certificado/';

                    // Directorio específico para la fecha actual
                    $directorioFecha = $directorioBase;

                    // Elimina el archivo existente si existe

                    $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
                    // Generar el nombre del archivo usando la fecha actual y un nombre único (por ejemplo, una marca de tiempo)
                    $nombreArchivo = $servicioData['cliente'] . '-' . $servicioData['nombre'] . '_' . uniqid() . '.' . $extension;

                    // Definir la ruta de destino para el archivo
                    $rutaDestino = $directorioFecha . $nombreArchivo;

                    // Mover el archivo a la ubicación de destino
                    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                        // Actualizar el nombre del archivo en la base de datos
                        $servicio->certificado = $nombreArchivo;
                    }
                }

                if (isset($_FILES['archivo4']) && $_FILES['archivo4']['error'] === UPLOAD_ERR_OK) {
                    $rutaTemporal = $_FILES['archivo4']['tmp_name'];
                    $nombreOriginal = $_FILES['archivo4']['name'];



                    // Directorio base donde se guardarán los archivos
                    $directorioBase = '../public/video/';

                    // Directorio específico para la fecha actual
                    $directorioFecha = $directorioBase;

                    // Elimina el archivo existente si existe

                    $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
                    // Generar el nombre del archivo usando la fecha actual y un nombre único (por ejemplo, una marca de tiempo)
                    $nombreArchivo = $servicioData['cliente'] . '-' . $servicioData['nombre'] . '_' . uniqid() . '.' . $extension;

                    // Definir la ruta de destino para el archivo
                    $rutaDestino = $directorioFecha . $nombreArchivo;

                    // Mover el archivo a la ubicación de destino
                    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                        // Actualizar el nombre del archivo en la base de datos
                        $servicio->video = $nombreArchivo;
                    }
                }

                if (isset($_FILES['archivo5']) && $_FILES['archivo5']['error'] === UPLOAD_ERR_OK) {
                    $rutaTemporal = $_FILES['archivo5']['tmp_name'];
                    $nombreOriginal = $_FILES['archivo5']['name'];



                    // Directorio base donde se guardarán los archivos
                    $directorioBase = '../public/comprobante/';

                    // Directorio específico para la fecha actual
                    $directorioFecha = $directorioBase;

                    // Elimina el archivo existente si existe

                    $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
                    // Generar el nombre del archivo usando la fecha actual y un nombre único (por ejemplo, una marca de tiempo)
                    $nombreArchivo = $servicioData['cliente'] . '-' . $servicioData['nombre'] . '_' . uniqid() . '.' . $extension;

                    // Definir la ruta de destino para el archivo
                    $rutaDestino = $directorioFecha . $nombreArchivo;

                    // Mover el archivo a la ubicación de destino
                    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                        // Actualizar el nombre del archivo en la base de datos
                        $servicio->comprobante = $nombreArchivo;
                    }
                }

                if (isset($_FILES['archivo7']) && $_FILES['archivo7']['error'] === UPLOAD_ERR_OK) {
                    $rutaTemporal = $_FILES['archivo7']['tmp_name'];
                    $nombreOriginal = $_FILES['archivo7']['name'];



                    // Directorio base donde se guardarán los archivos
                    $directorioBase = '../public/remisiones/';

                    // Directorio específico para la fecha actual
                    $directorioFecha = $directorioBase;

                    // Elimina el archivo existente si existe

                    $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
                    // Generar el nombre del archivo usando la fecha actual y un nombre único (por ejemplo, una marca de tiempo)
                    $nombreArchivo = $servicioData['cliente'] . '-' . $servicioData['nombre'] . '_' . uniqid() . '.' . $extension;

                    // Definir la ruta de destino para el archivo
                    $rutaDestino = $directorioFecha . $nombreArchivo;

                    // Mover el archivo a la ubicación de destino
                    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                        // Actualizar el nombre del archivo en la base de datos
                        $servicio->remisiones = $nombreArchivo;
                    }
                }
                
                $servicio->guardar();

                header('Location: /def');
            }
        }
        $router->render('servicio/actualizar', [
            'servicio' => $servicio
        ]);
    }

    public static function cambiarEstado()
    {
        session_start();

        isAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nuevoEstado = 1; // Cambia esto al nuevo valor deseado

            $servicio = Servicio::find($id);
            if ($servicio) {
                $servicio->estado = $nuevoEstado;
                $resultado = $servicio->guardar();

                if ($resultado) {
                    header('Location: /def');
                } else {
                    echo "Hubo un error al cambiar el estado.";
                }
            } else {
                echo "Servicio no encontrado.";
            }
        }
    }

    public static function cambiarCantidad()
    {
        session_start();

        isAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nuevoEstado = 1; // Cambia esto al nuevo valor deseado

            $servicio = Servicio::find($id);
            if ($servicio) {
                $servicio->estado = $nuevoEstado;
                $resultado = $servicio->guardar();

                if ($resultado) {
                    header('Location: /def');
                } else {
                    echo "Hubo un error al cambiar el estado.";
                }
            } else {
                echo "Servicio no encontrado.";
            }
        }
    }
}
