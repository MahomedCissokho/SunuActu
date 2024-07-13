<?php

require_once 'models/dao/ArticleDao.php';
require_once 'models/dao/CategorieDao.php';

class ArticleController {
    public function show($id) {
        $articleDao = new ArticleDao();
        $categorieDao = new CategorieDao();
        $article = $articleDao->getArticleById($id);
        $categories = $categorieDao->getListCategories();
        
        require 'views/article.php';
    }

    // Afficher le formulaire de création d'article
    public function create() {
        $categorieDao = new CategorieDao();
        $categories = $categorieDao->getListCategories();
        
        require 'views/add_article.php';
    }

    // Traiter la soumission du formulaire de création d'article
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article = new Article();
            $article->titre = $_POST['titre'];
            $article->contenu = $_POST['contenu'];
            $article->categorie = $_POST['categorie'];

            $articleDao = new ArticleDao();
            $articleDao->addArticle($article);

            // Redirigez vers la page d'accueil après ajout
            header('Location: /');
            exit();
        }
    }

    public function edit($id) {
        $articleDao = new ArticleDao();
        $article = $articleDao->getArticleById($id);
        $categorieDao = new CategorieDao();
        $categories = $categorieDao->getListCategories();

        require 'views/edit_article.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article = new Article();
            $article->id = $_POST['id'];
            $article->titre = $_POST['titre'];
            $article->contenu = $_POST['contenu'];
            $article->categorie = $_POST['categorie'];
             // Génération de la date de modification

            $articleDao = new ArticleDao();
            $articleDao->updateArticle($article);

            // Redirigez vers l'article mis à jour
            header('Location: /article/' . $article->id);
            exit();
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $articleDao = new ArticleDao();
            $articleDao->deleteArticle($id);

            // Redirigez vers la page d'accueil après suppression
            header('Location: /');
            exit();
        }
    }
}
?>
