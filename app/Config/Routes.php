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
$routes->setDefaultController('Home');
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
$routes->group('', ['filter' => 'login'], function($routes){
$routes->get('/', 'Home::index');
$routes->get('/barang', 'Barang::index');
$routes->delete('/pegawai', 'Pegawai::index');
$routes->delete('/ruangan/(:num)', 'Ruangan::delete/$');
$routes->delete('/barang/edit/(:segment)', 'Barang::edit/$1');
$routes->delete('/pegawai/edit/(:segment)', 'Pegawai::edit/$1');
$routes->delete('/ruangan/edit/(:segment)', 'Ruangan::edit/$1');
$routes->delete('/peminjaman/kembali/(:segment)', 'Peminjaman::kembali/$1');
});
// $routes->delete('/peminjaman/(:segment)', 'Peminjam::edit/$1');


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
