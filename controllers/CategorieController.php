<?php
require_once 'models/dao/ArticleDao.php';
require_once 'models/dao/CategorieDAO.php';

class CategoryController {
    public function show($id) {
        $articleDao = new ArticleDao();
        $categorieDAO = new CategorieDAO();


        $articles = $articleDao->getArticlesByCategorie($id);
        $categorie = $categorieDAO->getCategorieById($id);
        $categories = $categorieDAO->getListCategories();
        
        require 'views/articleBycategorie.php';
    }
}
?>