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


return $router;
?>
