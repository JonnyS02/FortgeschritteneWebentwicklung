<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('startseite', 'Home::startseite');

$routes->get( 'personen', 'Home::personen');
$routes->match(['get', 'post'], 'getPersonenAJAX', 'Home::getPersonenAJAX');

$routes->get('getPersonenApi', 'Api::getPersonenApi');

$routes->post('crudePersonApi', 'Api::crudePersonApi');

$routes->match(['get', 'post'], 'umsatz', 'Home::umsatz');

$routes->match(['get', 'post'], 'KIChat', 'Home::KIChat');
$routes->post( 'KIApi', 'Api::KIApi');
