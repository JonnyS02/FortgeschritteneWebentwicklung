<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::startseite');
$routes->get('startseite', 'Home::startseite');

$routes->get('personen', 'Home::personen');
$routes->get('getPersonenAJAX', 'Home::getPersonenAJAX');
$routes->post('crudePersonApi', 'Api::crudePersonApi');
$routes->post('getPersonenPDF', 'Home::getPersonenPDF');

$routes->get('umsatz', 'Home::umsatz');

$routes->get('KIChat', 'Home::KIChat');
$routes->post('KIApi', 'Api::KIApi');
