<?php
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedoresController;
use Controllers\PaginasController;
use Controllers\AdminUsserController;
use Controllers\BlogsController;

$router = new Router();

// CRUD  ZONA PRIVADA
$router->get('/login', [AdminUsserController::class, 'LogIn']);

// PROPIEDADES
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

// VENDEDORES
$router->get('/vendedores/crear', [VendedoresController::class, 'crear']);
$router->post('/vendedores/crear', [VendedoresController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedoresController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedoresController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedoresController::class, 'eliminar']);

// BLOGS
$router->get('/blog/crear', [BlogsController::class, 'crear']);
$router->post('/blog/crear', [BlogsController::class, 'crear']);

// ZONA PUBLICA 
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/blog', [BlogsController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

$router->comprobarRutas();
