<?php

    require_once'modele/dao/ArticleDao.php';
    require_once'modele/dao/CategorieDao.php';
    require_once'modele/domaine/Article.php';
    require_once'modele/domaine/Categorie.php';

    class Controller{
        function __construct(){

        }

        public function showAccueil(){
            $articleDao = new ArticleDao();
            $categorieDao = new CategorieDao();

            $articles = $articleDao->getListArticles();
            $categories = $categorieDao->getListCategories() ?? [];

            require_once 'vue/accueil.php';
        }
        
        public function showArticle($id){
            $articleDao = new ArticleDao();
            $categorieDao = new CategorieDao();

            $article = $articleDao->getArticleById($id);
            $categories = $categorieDao->getListCategories();

            require_once 'vue/article.php';
        }

        public function showCategorie($id){
            $articleDao = new ArticleDao();
            $categorieDao = new CategorieDao();

            $articles = $articleDao->getArticlesByCategorie($id);
            $categories = $categorieDao->getListCategories();

            require_once 'vue/articleByCategorie.php';
        }

        public function showErrorPage(){

        }

    }

?>