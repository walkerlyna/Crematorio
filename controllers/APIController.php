<?php



namespace Controllers;

use Model\Clientes;
use Model\Productos;
use Model\Servicio;
use MVC\Router;

class APIController
{
    public static function index()
    {
        $productos = Productos::all();
        echo json_encode($productos);
    }

    public static function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicioData = $_POST;  // Obtén los datos del formulario


            // Manejar la subida del archivo
            if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
                $rutaTemporal = $_FILES['archivo']['tmp_name'];
                $nombreOriginal = $_FILES['archivo']['name'];



                // Directorio base donde se guardarán los archivos
                $directorioBase = '../public/autorizacion/';

                // Directorio específico para la fecha actual
                $directorioFecha = $directorioBase .  '/';


                // Obtener la extensión del archivo
                $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);

                // Generar el nombre del archivo usando la fecha actual y un nombre único (por ejemplo, una marca de tiempo)
                $nombreArchivo = $servicioData['cliente'] . '-' . $servicioData['nombre'] . '_' . uniqid() . '.' . $extension;

                // Definir la ruta de destino para el archivo
                $rutaDestino = $directorioFecha . $nombreArchivo;

                if (!is_dir($directorioFecha)) {
                    mkdir($directorioFecha, 0777, true); // Puedes ajustar los permisos (0777) según tus necesidades
                }

                // Mover el archivo a la ubicación de destino
                if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    // Agregar el nombre del archivo a los datos del servicio
                    $servicioData['autorizacion'] = $nombreArchivo;
                }
            }

            // seccion evidencia
            $directorioBase = '../public/evidencia/';
            $directorioFecha = $directorioBase . '/';

            if (isset($_FILES['archivo2']) && $_FILES['archivo2']['error'] === UPLOAD_ERR_OK) {
                $rutaTemporal = $_FILES['archivo2']['tmp_name'];
                $nombreOriginal = $_FILES['archivo2']['name'];

                $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
                $nombreArchivo = $servicioData['cliente'] . '-' . $servicioData['nombre'] . '_' . uniqid() . '.' . $extension;
                $rutaDestino = $directorioFecha . $nombreArchivo;

                // Verifica si el directorio no existe y créalo si es necesario
                if (!is_dir($directorioFecha)) {
                    mkdir($directorioFecha, 0777, true); // Puedes ajustar los permisos (0777) según tus necesidades
                }

                if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    $servicioData['evidencia'] = $nombreArchivo;
                }
            }

            // seccion certificado
            $directorioBase = '../public/certificado/';
            $directorioFecha = $directorioBase . '/';



            if (isset($_FILES['archivo3']) && $_FILES['archivo3']['error'] === UPLOAD_ERR_OK) {
                $rutaTemporal = $_FILES['archivo3']['tmp_name'];
                $nombreOriginal = $_FILES['archivo3']['name'];

                $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
                $nombreArchivo = $servicioData['cliente'] . '-' . $servicioData['nombre'] . '_' . uniqid() . '.' . $extension;
                $rutaDestino = $directorioFecha . $nombreArchivo;

                if (!is_dir($directorioFecha)) {
                    mkdir($directorioFecha, 0777, true); // Puedes ajustar los permisos (0777) según tus necesidades
                }

                if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    $servicioData['certificado'] = $nombreArchivo;
                }
            }

            // seccion certificado
            $directorioBase = '../public/video/';
            $directorioFecha = $directorioBase . '/';



            if (isset($_FILES['archivo4']) && $_FILES['archivo4']['error'] === UPLOAD_ERR_OK) {
                $rutaTemporal = $_FILES['archivo4']['tmp_name'];
                $nombreOriginal = $_FILES['archivo4']['name'];

                $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
                $nombreArchivo = $servicioData['cliente'] . '-' . $servicioData['nombre'] . '_' . uniqid() . '.' . $extension;
                $rutaDestino = $directorioFecha . $nombreArchivo;

                if (!is_dir($directorioFecha)) {
                    mkdir($directorioFecha, 0777, true); // Puedes ajustar los permisos (0777) según tus necesidades
                }

                if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    $servicioData['video'] = $nombreArchivo;
                }
            }

            // seccion certificado
            $directorioBase = '../public/remisiones/';
            $directorioFecha = $directorioBase . '/';



            if (isset($_FILES['archivo7']) && $_FILES['archivo7']['error'] === UPLOAD_ERR_OK) {
                $rutaTemporal = $_FILES['archivo7']['tmp_name'];
                $nombreOriginal = $_FILES['archivo7']['name'];

                $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
                $nombreArchivo = $servicioData['cliente'] . '-' . $servicioData['nombre'] . '_' . uniqid() . '.' . $extension;
                $rutaDestino = $directorioFecha . $nombreArchivo;

                if (!is_dir($directorioFecha)) {
                    mkdir($directorioFecha, 0777, true); // Puedes ajustar los permisos (0777) según tus necesidades
                }

                if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    $servicioData['remisiones'] = $nombreArchivo;
                }
            }

            $directorioBase = '../public/comprobante/';
            $directorioFecha = $directorioBase . '/';



            if (isset($_FILES['archivo5']) && $_FILES['archivo5']['error'] === UPLOAD_ERR_OK) {
                $rutaTemporal = $_FILES['archivo5']['tmp_name'];
                $nombreOriginal = $_FILES['archivo5']['name'];

                $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
                $nombreArchivo = $servicioData['cliente'] . '-' . $servicioData['nombre'] . '_' . uniqid() . '.' . $extension;
                $rutaDestino = $directorioFecha . $nombreArchivo;

                if (!is_dir($directorioFecha)) {
                    mkdir($directorioFecha, 0777, true); // Puedes ajustar los permisos (0777) según tus necesidades
                }

                if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    $servicioData['comprobante'] = $nombreArchivo;
                }
            }
        }
        $servicio = new Servicio($servicioData);
        $resultado = $servicio->guardar();
        echo json_encode($resultado);
    }

    public static function autocomplete(Router $router)
    {
        if (isset($_GET['term'])) {
            $term = $_GET['term'];

            $clientes = Servicio::obtenerClientesAutocompletado($term);

            header('Content-Type: application/json');
            echo json_encode($clientes);
        }
    }

    public static function guardarClientes(Router $router) {
        $clientes = new Clientes($_POST);
        $resultado = $clientes->guardar();
        echo json_encode($resultado);
    }
}
