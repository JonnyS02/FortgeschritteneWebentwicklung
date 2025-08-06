<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');

$routes->match(['get', 'post'], 'home', 'Home::index');
$routes->match(['get', 'post'], 'map', 'Map::index');

$routes->match(['get', 'post'], 'getPersonenAJAX', 'Home::getPersonenAJAX');