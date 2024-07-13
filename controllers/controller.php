<?php

    require_once'models/dao/ArticleDao.php';
    require_once'models/dao/CategorieDao.php';
    require_once'models/domain/Article.php';
    require_once'models/domain/Categorie.php';

    class Controller{
        function __construct(){

        }

        public function showAccueil(){
            $articleDao = new ArticleDao();
            $categorieDao = new CategorieDao();

            $articles = $articleDao->getListArticles();
            $categories = $categorieDao->getListCategories() ?? [];

            require_once 'views/accueil.php';
        }
        
        public function showArticle($id){
            $articleDao = new ArticleDao();
            $categorieDao = new CategorieDao();

            $article = $articleDao->getArticleById($id);
            $categories = $categorieDao->getListCategories();

            require_once 'views/article.php';
        }

        public function showCategorie($id){
            $articleDao = new ArticleDao();
            $categorieDao = new CategorieDao();

            $articles = $articleDao->getArticlesByCategorie($id);
            $categories = $categorieDao->getListCategories();

            require_once 'views/articleByCategorie.php';
        }

        public function showErrorPage(){

        }

    }

?>