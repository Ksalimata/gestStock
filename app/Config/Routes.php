<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::loginPost');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('/inscription', 'AuthController::inscription');
$routes->post('/enregistrer', 'AuthController::enregistrer');


$routes->get('/produit', 'Produits::index');
$routes->post('/add_produit', 'Produits::add_produit');

$routes->get('/categorie', 'Categorie::index');
$routes->post('/add_categorie', 'Categorie::add_categorie');

$routes->get('/mouvement', 'Mouvement::index');
$routes->post('/add_mouvement', 'Mouvement::add_mouvement');

$routes->get('/users', 'Users::index');
$routes->post('/add_user', 'Users::add_user');

