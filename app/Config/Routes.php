<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 /*
 get( '/ruta_web' , Controlador::funcion    )
 */
$routes->get('/', 'Home::index');
// (:any) = Caracteres, numeros, simbolos
// (:segment) = Carateres, numeros, simbolos
// (:num) = Numeros, positivos o negativos
// (:alpha) = Puros caracteres mayusculas y minusculas 
// (:alphanum) = Caracteres y numeros
// los que normalmente se usan o los mas usados, son (:num), (:alpha) y (:alphanum)

//cuando entren a /saludar que imprima hola mundo 
$routes->get('/saludar/(:alpha)', 'Home::saludar2/$1');

$routes->get('/calculadora/(:num)/(:num)/(:alpha)', 'Home::calculadora/$1/$2/$3');

//USUARIOS
$routes->get('/usuarios', 'UsuarioController::index'); //todos los usuarios
$routes->get('/usuarios/(:num)', 'UsuarioController::show/$1'); // info un usuario
$routes->get('/usuarios/create', 'UsuarioController::create'); //formulario crear usuario
$routes->post('/usuarios/store', 'UsuarioController::store'); //controlador crear usuario
$routes->get('/usuarios/(:num)/edit', 'UsuarioController::edit/$1'); //formulario editar usuario
$routes->post('/usuarios/(:num)/update', 'UsuarioController::update/$1'); //controlador editar usuario
$routes->get('/usuarios/(:num)/delete', 'UsuarioController::delete/$1'); //controlador eliminar usuario

$routes->get('/login', 'UsuarioController::login'); //view form
$routes->post('/login', 'UsuarioController::login'); //controlador validar login
$routes->get('/logout', 'UsuarioController::logout'); //cerrar sesion

//PAQUETES
$routes->get('/paquetes', 'PaqueteController::index'); // Ver todos los paquetes
$routes->get('/paquetes/(:num)', 'PaqueteController::show/$1'); // Ver un paquete específico
$routes->get('/paquetes/create', 'PaqueteController::create'); // Formulario para crear un paquete
$routes->post('/paquetes/store', 'PaqueteController::store'); // Guardar un nuevo paquete
$routes->get('/paquetes/(:num)/edit', 'PaqueteController::edit/$1'); // Formulario para editar un paquete
$routes->post('/paquetes/(:num)/update', 'PaqueteController::update/$1'); // Actualizar un paquete
$routes->get('/paquetes/(:num)/delete', 'PaqueteController::delete/$1'); // Eliminar un paquete

$routes->get('/plantilla', 'Home::plantilla'); //cheto