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
$routes->setDefaultController('User');
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
$routes->match(['get', 'post'],'/', 'User::index', ['filter' => 'noAuth']);

//Admin Routes
$routes->group('admin', ["filter" => "auth"], static function ($routes) {

    //Admin Root
    $routes->get('/', 'AdminController::index');

    //User Management Customer Section
    $routes->match(['get', 'post'], 'add-customers', 'AdminController::addCustomers');
    $routes->match(['get', 'post'], 'manage-customers', 'AdminController::manageCustomers');
    $routes->match(['get', 'post'], 'user-documents', 'AdminController::userDocuments');
    $routes->match(['get', 'post'], 'customers-edit/(:num)', 'AdminController::editCustomers/$1');
    $routes->match(['get', 'post'], 'customers-delete/(:num)', 'AdminController::deleteCustomers/$1');
    $routes->match(['get', 'post'], 'customers-update/(:num)', 'AdminController::updateCustomers/$1');

    //User Management Investors Section
    $routes->match(['get', 'post'], 'add-investors', 'AdminController::addInvestors');
    $routes->match(['get', 'post'], 'manage-investors', 'AdminController::manageInvestors');
    $routes->match(['get', 'post'], 'investors-documents', 'AdminController::investorDocuments');
    $routes->match(['get', 'post'], 'investors-edit/(:num)', 'AdminController::editInvestors/$1');
    $routes->match(['get', 'post'], 'investors-delete/(:num)', 'AdminController::deleteInvestors/$1');
    $routes->match(['get', 'post'], 'investors-update/(:num)', 'AdminController::updateInvestors/$1');

    //User Management Staffs Section
    $routes->match(['get', 'post'], 'add-staffs', 'AdminController::addStaffs');
    $routes->match(['get', 'post'], 'manage-staffs', 'AdminController::manageStaffs');
    $routes->match(['get', 'post'], 'staffs-documents', 'AdminController::staffsDocuments');
    $routes->match(['get', 'post'], 'staffs-edit/(:num)', 'AdminController::editStaffs/$1');
    $routes->match(['get', 'post'], 'staffs-delete/(:num)', 'AdminController::deleteStaffs/$1');
    $routes->match(['get', 'post'], 'staffs-update/(:num)', 'AdminController::updateStaffs/$1');

    //Candil Portal Modules [Brainstorm Section]
    $routes->match(['get', 'post'], 'brainstorm-lists', 'AdminController::brainstormLists');
    $routes->match(['get', 'post'], 'brainstorm-pending-list', 'AdminController::brainstormPendingList');
    $routes->match(['get', 'post'], 'brainstorm-categories', 'AdminController::brainstormCategories');
    $routes->match(['get', 'post'], 'manage-brainstorm', 'AdminController::manageBrainstormCategories');
    $routes->match(['get', 'post'], 'brainstorm-category-edit/(:num)', 'AdminController::editBrainstormCategories/$1');
    $routes->match(['get', 'post'], 'brainstorm-category-delete/(:num)', 'AdminController::deleteBrainstormCategories/$1');
    $routes->match(['get', 'post'], 'brainstorm-category-update/(:num)', 'AdminController::updateBrainstormCategories/$1');
    $routes->match(['get', 'post'], 'brainstorm-view/(:num)', 'AdminController::viewBrainstorm/$1');
    $routes->match(['get', 'post'], 'brainstorm-accept/(:num)', 'AdminController::acceptBrainstorm/$1');

    //Candil Portal Modules [Thesis Section]
    $routes->match(['get', 'post'], 'thesis-lists', 'AdminController::thesisLists');
    $routes->match(['get', 'post'], 'thesis-pending-list', 'AdminController::thesisPendingList');
    $routes->match(['get', 'post'], 'thesis-categories', 'AdminController::thesisCategories');
    $routes->match(['get', 'post'], 'manage-thesis', 'AdminController::manageThesisCategories');
    $routes->match(['get', 'post'], 'thesis-category-edit/(:num)', 'AdminController::editThesisCategories/$1');
    $routes->match(['get', 'post'], 'thesis-category-delete/(:num)', 'AdminController::deleteThesisCategories/$1');
    $routes->match(['get', 'post'], 'thesis-category-update/(:num)', 'AdminController::updateThesisCategories/$1');
    $routes->match(['get', 'post'], 'thesis-view/(:num)', 'AdminController::viewThesis/$1');
    $routes->match(['get', 'post'], 'thesis-accept/(:num)', 'AdminController::acceptThesis/$1');

    //Candil Portal Modules [Hiring Section]
    $routes->match(['get', 'post'], 'vacant-list', 'AdminController::vacantList');
    $routes->match(['get', 'post'], 'pending-vacant', 'AdminController::pendingVacant');
    $routes->match(['get', 'post'], 'hiring-categories', 'AdminController::hiringCategories');
    $routes->match(['get', 'post'], 'manage-hiring-categories', 'AdminController::manageHiringCategories');
    $routes->match(['get', 'post'], 'application-list', 'AdminController::applicationList');

});


//API Controllers
$routes->match(['get', 'post'], 'api/create-brainstorm', 'ApiController::brainstormCreate');
$routes->match(['get', 'post'], 'api/list-brainstorm', 'ApiController::brainstormList');
$routes->match(['get', 'post'], 'api/create-job', 'ApiController::jobCreate');
$routes->match(['get', 'post'], 'api/list-job', 'ApiController::jobList');
$routes->match(['get', 'post'], 'api/create-thesis', 'ApiController::ThesisCreate');
$routes->match(['get', 'post'], 'api/list-thesis', 'ApiController::ThesisList');

$routes->get('logout', 'User::logout');

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
