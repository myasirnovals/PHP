<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HseAdmin::login');
$routes->get('/admin', 'HseAdmin::dashboard');
$routes->get('/admin/login', 'HseAdmin::login');
$routes->get('/admin/dashboard', 'HseAdmin::dashboard');
$routes->get('/admin/laporan', 'HseAdmin::reports');
$routes->get('/admin/laporan/(:segment)', 'HseAdmin::detail/$1');
$routes->get('/admin/peta', 'HseAdmin::map');
$routes->get('/admin/pengguna', 'HseAdmin::users');
