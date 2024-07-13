<?php

require_once 'routes/Router.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/ArticleController.php';
require_once 'controllers/CategorieController.php';
require_once 'controllers/LoginController.php';


$router = new Router();

// Route pour la page d'accueil
$router->get('/', ['HomeController', 'index']);

// Route pour afficher un article spécifique
$router->get('/article/{id}', ['ArticleController', 'show']);

// Route pour afficher les articles d'une catégorie spécifique
$router->get('/categorie/{id}', ['CategoryController', 'show']);

// Nouvelles routes pour le contrôleur de connexion
$router->get('/login', ['LoginController', 'showLoginForm']); // Afficher le formulaire de connexion
$router->post('/authenticate', ['LoginController', 'authenticate']); // Authentifier l'utilisateur
$router->get('/logout', ['LoginController', 'logout']); // Déconnexion de l'utilisateur

// Routes pour modifier et supprimer un article
$router->get('/edit_article/{id}', ['ArticleController', 'edit']);
$router->post('/update_article', ['ArticleController', 'update']);
$router->post('/delete_article', ['ArticleController', 'delete']);


$router->get('/add_article', ['ArticleController', 'create']);

// Route pour traiter la soumission du formulaire de création d'article
$router->post('/store', ['ArticleController', 'store']);

// Routes pour les catégories
$router->get('/add_category', ['CategoryController', 'create']);
$router->post('/store_category', ['CategoryController', 'store']);
$router->get('/list_categories', ['CategoryController', 'list']);

// Route pour supprimer une catégorie
$router->post('/delete_category/{id}', ['CategoryController', 'delete']);
$router->get('/confirm_delete_category/{id}', ['CategoryController', 'confirmDelete']);
// Route pour afficher le formulaire de modification de catégorie
$router->get('/edit_category/{id}', ['CategoryController', 'edit']);

// Route pour traiter la soumission du formulaire de modification de catégorie
$router->post('/update_category', ['CategoryController', 'update']);

return $router;
?>
