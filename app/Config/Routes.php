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
$routes->setDefaultController('Home');
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

$routes->get('login', 'AuthController::index', ['filter' => 'guestfilter']);
$routes->post('login', 'AuthController::login', ['filter' => 'guestfilter']);
$routes->get('logout', 'AuthController::logout', ['filter' => 'authuserfilter']);

$routes->get('/', 'DashboardController::index', ['filter' => 'authuserfilter']);
$routes->get('/profile', 'ProfileController::index', ['filter' => 'authuserfilter']);
$routes->post('/profile', 'ProfileController::save', ['filter' => 'authuserfilter']);
$routes->post('/profile/change-password', 'ProfileController::changePassword', ['filter' => 'authuserfilter']);

// product categories
$routes->get('master/product-categories', 'ProductCategoryController::index', ['filter' => 'authusermanajerfilter']);
$routes->post('master/product-categories', 'ProductCategoryController::store', ['filter' => 'authusermanajerfilter']);
$routes->post('master/product-categories/update/(:segment)', 'ProductCategoryController::update/$1', ['filter' => 'authusermanajerfilter']);
$routes->get('master/product-categories/delete/(:segment)', 'ProductCategoryController::delete/$1', ['filter' => 'authusermanajerfilter']);
// product
$routes->get('master/products', 'ProductController::index', ['filter' => 'authusermanajerfilter']);
$routes->get('master/products/create', 'ProductController::create', ['filter' => 'authusermanajerfilter']);
$routes->post('master/products/create', 'ProductController::store', ['filter' => 'authusermanajerfilter']);
$routes->get('master/products/edit/(:segment)', 'ProductController::edit/$1', ['filter' => 'authusermanajerfilter']);
$routes->post('master/products/update/(:segment)', 'ProductController::update/$1', ['filter' => 'authusermanajerfilter']);
$routes->get('master/products/delete/(:segment)', 'ProductController::delete/$1', ['filter' => 'authusermanajerfilter']);
// payment methods
$routes->get('master/payment-methods', 'PaymentMethodController::index', ['filter' => 'authusermanajerfilter']);
$routes->post('master/payment-methods', 'PaymentMethodController::store', ['filter' => 'authusermanajerfilter']);
$routes->post('master/payment-methods/update/(:segment)', 'PaymentMethodController::update/$1', ['filter' => 'authusermanajerfilter']);
$routes->get('master/payment-methods/delete/(:segment)', 'PaymentMethodController::delete/$1', ['filter' => 'authusermanajerfilter']);
// user
$routes->get('users', 'UserController::index', ['filter' => 'authusermanajerfilter']);
$routes->get('users/create', 'UserController::create', ['filter' => 'authusermanajerfilter']);
$routes->post('users/create', 'UserController::store', ['filter' => 'authusermanajerfilter']);
$routes->get('users/edit/(:segment)', 'UserController::edit/$1', ['filter' => 'authusermanajerfilter']);
$routes->post('users/update/(:segment)', 'UserController::update/$1', ['filter' => 'authusermanajerfilter']);
$routes->post('users/update-password/(:segment)', 'UserController::updatePassword/$1', ['filter' => 'authusermanajerfilter']);
$routes->get('users/delete/(:segment)', 'UserController::delete/$1', ['filter' => 'authusermanajerfilter']);


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
