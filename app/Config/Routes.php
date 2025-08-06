<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->match(['get', 'post'], '/', 'Anmeldung::index');
$routes->match(['get', 'post'], 'anmeldung', 'Anmeldung::index');

$routes->match(['get', 'post'], 'startseite', 'Startseite::index');

$routes->match(['get', 'post'], 'personen', 'Personen::index');
$routes->match(['get', 'post'], 'getPersonenAJAX', 'Personen::getPersonenAJAX');

$routes->match(['get', 'post'], 'karte', 'Karte::index');

