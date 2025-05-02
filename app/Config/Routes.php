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
$routes->get('/add_produit', 'Produits::add_produit');
$routes->post('/create_produit', 'Produits::create_produit');
$routes->get('/edit_produit/(:num)', 'Produits::edit_produit/$1');
$routes->post('/update_produit/(:num)', 'Produits::update_produit/$1');
$routes->get('/delete_produit/(:num)', 'Produits::delete_produit/$1');

$routes->get('/categorie', 'Categorie::index');
$routes->get('/add_categorie', 'Categorie::add_categorie');
$routes->post('/create_categorie', 'Categorie::create_categorie');
$routes->get('/edit_categorie/(:num)', 'Categorie::edit_categorie/$1');
$routes->post('/update_categorie/(:num)', 'Categorie::update_categorie/$1');
$routes->get('/delete_categorie/(:num)', 'Categorie::delete_categorie/$1');



$routes->get('/mouvement', 'Mouvement::index');
$routes->get('/add_mouvement', 'Mouvement::add_mouvement');
$routes->post('/create_mouvement', 'Mouvement::create_mouvement');
$routes->get('/edit_mouvement/(:num)', 'Mouvement::edit_mouvement/$1');
$routes->post('/update_mouvement/(:num)', 'Mouvement::update_mouvement/$1');

$routes->get('/users', 'Users::index');
$routes->get('/add_user', 'Users::add_user');
$routes->post('/create_user', 'Users::create_user');

