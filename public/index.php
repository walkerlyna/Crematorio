<?php 

require_once __DIR__ . '/../includes/app.php';


use Controllers\AdminController;
use Controllers\APIController;
use Controllers\ArchivosController;
use Controllers\AutorizacionController;
use Controllers\CedulaController;
use Controllers\CitaController;
use Controllers\DefuncionController;
use Controllers\FacturaController;
use Controllers\LoginController;
use Controllers\PanelController;
use Controllers\PDFController;
use Controllers\ProductoController;
use Controllers\UsuarioController;
use MVC\Router;
$router = new Router();

// iniciar sesion
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// recuperar password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, '  recuperar']);

// crear cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);

// confirmar cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

// AREA PRIVADA
$router->get('/qwerty', [PanelController::class]);


// PANEL
$router->get('/panel', [PanelController::class, 'index']);
$router->get('/def', [DefuncionController::class, 'index']);
$router->get('/inventario', [DefuncionController::class, 'index']);

$router->get('/facturas', [FacturaController::class, 'index']);



$router->get('/api/actualizar', [DefuncionController::class, 'actualizar']);
$router->post('/api/actualizar', [DefuncionController::class, 'actualizar']);
// API 
$router->post('/api/servicios', [APIController::class, 'guardar']);
$router->get('/autocomplete', [APIController::class, 'autocomplete']);
$router->post('/autocomplete', [APIController::class, 'autocomplete']);

//probando FPDF
$router->post('/generar/pdf', [PDFController::class, 'index']);



$router->post('/servicio/eliminar', [DefuncionController::class, 'cambiarEstado']);


//subida de archivos
// AUTORIZACION



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

