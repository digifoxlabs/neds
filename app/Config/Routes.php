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
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function(){

    return view('404');
});
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
$routes->get('/', 'Home::index');





$routes->group('admin', ['namespace' => 'App\Controllers\Admin'] ,static function ($routes) {


    $routes->get("/", 'Dashboard::index', ['filter' => 'auth']);
    $routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
    $routes->match(['get', 'post'], 'login', 'User::login', ['filter' => 'noauth']);
    $routes->get('register', 'User::register');
    $routes->get('logout', 'User::logout');
    $routes->match(['get','post'],'profile', 'User::profile',['filter' => 'auth']);
    $routes->match(['get','post'],'settings', 'Settings::index',['filter' => 'auth']);

    $routes->get('customers', 'Customers::manage', ['filter' => 'auth']);

    $routes->post('ajaxLoadAllCustomers', 'Customers::ajaxLoadAllCustomers');

 
});




$routes->group("api",['namespace' => 'App\Controllers\Api'] , function ($routes) {

    $routes->post("register", "User::register");
    $routes->post("login", "User::login");
    $routes->get("profile", "User::profile");
    $routes->get("users", "User::allUsers");
});




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
