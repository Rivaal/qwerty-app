<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('PageUser');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'PageUser::home');
$routes->get('galeri/', 'PageUser::galeri');
$routes->get('detailgaleri(:any)', 'PageUser::detailgaleri::$1');
$routes->get('detailfoto(:any)', 'PageUser::detailfoto::$1');
$routes->get('video/', 'PageUser::video');
$routes->get('katalog/', 'PageUser::katalog');
$routes->get('katalogdetail(:any)', 'PageUser::katalogdetail::$1');
$routes->get('katalogsearch(:any)', 'PageUser::katalogsearch::$1');
$routes->get('packagedetail(:any)', 'PageUser::packagedetail::$1');
$routes->get('singledetail(:any)', 'PageUser::singledetail::$1');
$routes->get('caratransaksi/', 'PageUser::caratransaksi');
$routes->get('login', 'Auth::loginclient');
$routes->post('logins', 'Auth::logincheckclient');
$routes->get('logout', 'Auth::logoutclient');
$routes->get('keranjang', 'PageUser::keranjangasaya');
$routes->get('tambahkeranjang(:any)', 'PageUser::tambahkeranjang::$1');
$routes->get('hapuskeranjang(:any)', 'PageUser::hapuskeranjang::$1');
$routes->get('hapusbooking(:any)', 'PageUser::hapusbooking::$1');
$routes->get('booking(:any)', 'PageUser::booking::$1');
$routes->get('listbooking', 'PageUser::listbooking');
$routes->post('prosesbooking(:any)', 'PageUser::prosesbooking::$1');
$routes->get('infopembayaran(:any)', 'PageUser::infopembayaran::$1');
$routes->get('konfirmasipembayaran(:any)', 'PageUser::konfirmasipembayaran::$1');
$routes->get('bayarpesanan(:any)', 'PageUser::bayarpesanan::$1');
$routes->get('konfirmpembayaran(:any)', 'PageUser::konfirmpembayaran::$1');
$routes->post('acceptbukti(:any)', 'PageUser::acceptbukti::$1');
$routes->get('verifikasi(:any)', 'PageUser::verifikasi::$1');
$routes->get('hubungikami/', 'PageUser::hubungikami');

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
