<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('museum', 'Museum::index');
$routes->get('museum/pesan', 'Museum::Pesan');