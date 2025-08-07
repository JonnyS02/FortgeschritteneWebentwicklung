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

$routes->get('getPersonenApi', 'Api::getPersonenApi');

$routes->post('crudePersonApi', 'Api::crudePersonApi');

$routes->match(['get', 'post'], 'wetter', 'Home::wetter');

$routes->match(['get', 'post'], 'KIChat', 'Home::KIChat');
$routes->post( 'KIApi', 'Api::KIApi');
