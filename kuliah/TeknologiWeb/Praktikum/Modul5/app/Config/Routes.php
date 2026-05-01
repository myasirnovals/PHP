<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('country', 'Country::index');
$routes->get('city', 'City::index');
$routes->get('language', 'Language::index');
