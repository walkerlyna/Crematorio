<?php 

require_once __DIR__ . '/../includes/app.php';


use Controllers\AdminController;
use Controllers\APIController;
use Controllers\ArchivosController;
use Controllers\AutorizacionController;
use Controllers\CedulaController;
use Controllers\CitaController;
use Controllers\DefuncionAdminController;
use Controllers\DefuncionController;
use Controllers\FacturaAdminController;
use Controllers\FacturaController;
use Controllers\LoginController;
use Controllers\PanelAdminController;
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
$router->get('/qwerty', [PanelAdminController::class, 'index']);
$router->get('/defu', [DefuncionAdminController::class, 'index']);
$router->get('/allServices', [DefuncionAdminController::class, 'allServices']);


// PANEL
$router->get('/panel', [PanelController::class, 'index']);
$router->get('/def', [DefuncionController::class, 'index']);
$router->get('/inventario', [InventarioController::class, 'index']);

$router->get('/facturass', [FacturaAdminController::class, 'index']);
$router->get('/facturas', [FacturaController::class, 'index']);

// API 
$router->get('/api/actualizar', [DefuncionController::class, 'actualizar']);
$router->post('/api/actualizar', [DefuncionController::class, 'actualizar']);
$router->post('/api/servicios', [APIController::class, 'guardar']);
$router->get('/autocomplete', [APIController::class, 'autocomplete']);
$router->post('/autocomplete', [APIController::class, 'autocomplete']);

//probando FPDF
$router->post('/generar/pdf', [PDFController::class, 'index']);


$router->get('/api/actualizarr', [DefuncionAdminController::class, 'actualizar']);
$router->post('/api/actualizarr', [DefuncionAdminController::class, 'actualizar']);
$router->post('/servicio/eliminarr', [DefuncionAdminController::class, 'cambiarEstado']);


//subida de archivos
// AUTORIZACION



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

