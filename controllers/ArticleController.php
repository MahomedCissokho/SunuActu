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
}

?>