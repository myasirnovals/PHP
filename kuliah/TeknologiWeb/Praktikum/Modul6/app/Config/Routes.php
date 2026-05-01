<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Country CRUD
$routes->get('country', 'Country::index');
$routes->get('country/tambah', 'Country::tambah');
$routes->post('country/simpan', 'Country::simpan');
$routes->get('country/edit/(:segment)', 'Country::edit/$1');
$routes->post('country/update/(:segment)', 'Country::update/$1');
$routes->get('country/hapus/(:segment)', 'Country::hapus/$1');
$routes->post('country/proses_hapus/(:segment)', 'Country::proses_hapus/$1');

// City CRUD
$routes->get('city', 'City::index');
$routes->get('city/tambah', 'City::tambah');
$routes->post('city/simpan', 'City::simpan');
$routes->get('city/edit/(:num)', 'City::edit/$1');
$routes->post('city/update/(:num)', 'City::update/$1');
$routes->get('city/hapus/(:num)', 'City::hapus/$1');
$routes->post('city/proses_hapus/(:num)', 'City::proses_hapus/$1');

// Language CRUD
$routes->get('language', 'Language::index');
$routes->get('language/tambah', 'Language::tambah');
$routes->post('language/simpan', 'Language::simpan');
$routes->get('language/edit/(:segment)/(:segment)', 'Language::edit/$1/$2');
$routes->post('language/update/(:segment)/(:segment)', 'Language::update/$1/$2');
$routes->get('language/hapus/(:segment)/(:segment)', 'Language::hapus/$1/$2');
$routes->post('language/proses_hapus/(:segment)/(:segment)', 'Language::proses_hapus/$1/$2');
