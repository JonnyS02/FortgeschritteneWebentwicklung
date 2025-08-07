<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->match(['get', 'post'], '/', 'Home::anmeldung');
$routes->match(['get', 'post'], 'anmeldung', 'Home::anmeldung');

$routes->match(['get', 'post'], 'startseite', 'Home::startseite');

$routes->match(['get', 'post'], 'personen', 'Home::personen');
$routes->match(['get', 'post'], 'getPersonenAJAX', 'Home::getPersonenAJAX');

$routes->match(['get', 'post'], 'karte', 'Home::karte');

