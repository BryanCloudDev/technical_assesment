<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//obtener los detalles de cada pedido
$routes->get('/detalles', 'PedidoDetalle::getAllPedidosDetalle');
$routes->get('/detalle', 'PedidoDetalle::getOnePedidosDetalle');

//obtener productos

$routes->get('/productos', 'Producto::getAllProductos');
$routes->get('/producto', 'Producto::getOneProducto');

//obtener pedidos

$routes->get('/pedidos', 'Pedido::getAllPedidos');
$routes->get('/pedido', 'Pedido::getPedido');

// --------------------------------------------------------------
//borrar

$routes->get('/delete/detalle','Delete::detalle');
$routes->get('/delete/producto','Delete::producto');
$routes->get('/delete/pedido','Delete::pedido');
//---------------------------------------------------------------
//crear

$routes->post('/create/detalle','Crear::detalle');
$routes->get('/create/producto','Crear::producto');
$routes->get('/create/pedido','Crear::pedido');
// ----------------------------------------------------------------

//editar

$routes->get('/edit/producto','Editar::producto');
$routes->get('/edit/pedido','Editar::pedido');

//------------------------------

$routes->get('/','Home::index');
$routes->get('/purchase','Home::purchase');
$routes->get('/dashboard','Home::dashboard');
$routes->get('/nuevo','Home::nuevo');
$routes->get('/editar/producto','Home::editarItem');



// $routes->get('/url', 'Pedidos::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
