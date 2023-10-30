<?php 

require_once __DIR__ . '/../includes/app.php';


use Controllers\AdminController;
use Controllers\APIController;
use Controllers\ArchivosController;
use Controllers\AutorizacionController;
use Controllers\CedulaController;
use Controllers\CitaController;
use Controllers\ClienteAdminController;
use Controllers\ClienteController;
use Controllers\DefuncionAdminController;
use Controllers\DefuncionController;
use Controllers\FacturaAdminController;
use Controllers\FacturaController;
use Controllers\InventarioController;
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
$router->get('/clientes', [ClienteController::class, 'index']);
$router->get('/clientess', [ClienteAdminController::class, 'index']);

$router->get('/facturass', [FacturaAdminController::class, 'index']);
$router->get('/facturas', [FacturaController::class, 'index']);

// API 
$router->get('/api/actualizar', [DefuncionController::class, 'actualizar']);
$router->post('/api/actualizar', [DefuncionController::class, 'actualizar']);
$router->post('/api/servicios', [APIController::class, 'guardar']);
$router->get('/autocomplete', [APIController::class, 'autocomplete']);
$router->post('/autocomplete', [APIController::class, 'autocomplete']);
$router->get('/api/productos', [APIController::class, 'index']);
$router->post('/api/clientes', [APIController::class, 'guardarClientes']);

$router->get('/api/actualizar2', [ClienteController::class, 'actualizar2']);
$router->post('/api/actualizar2', [ClienteController::class, 'actualizar2']);

$router->get('/api/actualizar3', [ClienteAdminController::class, 'actualizar3']);
$router->post('/api/actualizar3', [ClienteAdminController::class, 'actualizar3']);

$router->post('/clientes/eliminar2', [ClienteController::class, 'eliminar2']);
$router->post('/clientes/eliminar3', [ClienteAdminController::class, 'eliminar3']);
//probando FPDF
$router->post('/generar/pdf', [PDFController::class, 'index']);



$router->get('/api/actualizarr', [DefuncionAdminController::class, 'actualizar']);
$router->post('/api/actualizarr', [DefuncionAdminController::class, 'actualizar']);
$router->post('/servicio/ocultar', [DefuncionAdminController::class, 'cambiarEstado']);
$router->post('/servicio/desocultar', [DefuncionAdminController::class, 'desocultar']);


//subida de archivos
// AUTORIZACION



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

