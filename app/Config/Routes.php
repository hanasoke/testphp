<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Car::index');
// untuk menampilkan formulit tambah
$routes->get('/car/create', 'Car::create');

// untuk melakukan penambahan data
$routes->post('/car/save', 'Car::save');

// Untuk menampilkan formulir edit
$routes->get('/car/edit/(:num)', 'Car::edit/$1');

// untuk mengupdate data
$routes->post('/car/update/(:num)', 'Car::update/$1');

// untuk menghapus data
$routes->delete('car/delete/(:num)', 'Car::delete/$1');