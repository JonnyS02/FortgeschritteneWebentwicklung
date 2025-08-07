<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('startseite', 'Home::startseite');

$routes->get('personen', 'Home::personen');
$routes->get('getPersonenAJAX', 'Home::getPersonenAJAX');
$routes->get('getPersonenApi', 'Api::getPersonenApi');
$routes->post('crudePersonApi', 'Api::crudePersonApi');
$routes->get('getPersonenPDF', 'Home::getPersonenPDF');

$routes->get('umsatz', 'Home::umsatz');

$routes->get('KIChat', 'Home::KIChat');
$routes->post('KIApi', 'Api::KIApi');
