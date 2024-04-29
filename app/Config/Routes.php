<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->get('/inmuebles', 'inmuebles::index');
$routes->get('inmuebles/registro', 'inmuebles::registro');
$routes->get('inmuebles/listar', 'inmuebles::listar');
$routes->post('inmuebles/insertar', 'inmuebles::insertar');

$routes->get('/home', 'home::index');
$routes->get('/salir', 'Login::salir');
$routes->get('/login/entrar', 'Login::entrar');
$routes->get('/usuarios/listar', 'usuarios::listar');
$routes->get('/usuarios/pagos', 'Pagos::index');
$routes->get('/usuarios/hacerpago', 'Pagos::hacerpago');
$routes->post('/usuarios/guardarpago', 'Pagos::guardarpago');
$routes->get('/usuarios/pagar/(:any)', 'Pagos::pagaralquiler/$1');
$routes->get('/pagos/generarReciboPDF/(:any)', 'pagos::generarReciboPDF/$1');
$routes->get('/pagos/muestraReciboPDF/(:any)', 'pagos::muestraReciboPDF/$1');
$routes->get('/pagos/editarReciboPDF/(:any)', 'pagos::editarReciboPDF/$1');
$routes->post('/pagos/updatepago/(:any)', 'pagos::updatepago/$1');
$routes->post('/pagos/validarpago/(:any)', 'pagos::validarpago/$1');
$routes->post('/pagos/delete/(:any)', 'pagos::delete/$1');
$routes->get('/pdf/pdftest', 'PdfTest::testGeneratePdf');




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
