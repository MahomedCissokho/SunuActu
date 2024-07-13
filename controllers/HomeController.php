<?php

require_once 'models/dao/ArticleDao.php';
require_once 'models/dao/CategorieDao.php';

class HomeController {
    private $articleDao;

    public function __construct() {
        $this->articleDao = new ArticleDao();
        $this->categorieDao = new CategorieDao();
    }

    public function index() {
        // Définir le nombre d'articles par page
        $articlesPerPage = 2;
        
        // Récupérer le numéro de page actuel depuis la requête GET, par défaut 1
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        // Calculer le décalage (offset) pour la requête SQL
        $offset = ($page - 1) * $articlesPerPage;
        
        // Récupérer les articles de la base de données avec la limite et le décalage
        $articles = $this->articleDao->getListArticles($articlesPerPage, $offset);
        
        // Récupérer le nombre total d'articles pour calculer le nombre total de pages
        $totalArticles = $this->articleDao->getTotalArticlesCount();
        $totalPages = ceil($totalArticles / $articlesPerPage);
        $categories = $this->categorieDao->getListCategories();
        
        // Inclure la vue de la page d'accueil
        include 'views/accueil.php';
    }
}
?>