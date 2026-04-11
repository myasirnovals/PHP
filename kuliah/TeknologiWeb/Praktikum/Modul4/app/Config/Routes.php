<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Tugas_lingkaran', 'Lingkaran::index');

$routes->get('/test', 'Test::index');
$routes->get('/test/hello', 'Test::hello');
$routes->get('/test/profil', 'Test::profil');

$routes->get('/calc', 'Calc::index');
$routes->post('/calc/hitung', 'Calc::hitung');

$routes->get('/tugas4', 'TugasModul4::index');

$routes->get('/latihan5', 'Latihan5::index');
$routes->post('/latihan5/signin', 'Latihan5::signin');