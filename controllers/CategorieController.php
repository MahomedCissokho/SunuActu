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

    public function create() {
        require 'views/add_category.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer et nettoyer le libellé de la catégorie depuis le formulaire
            $libelle = trim($_POST['libelle']); // Utilisation de trim pour enlever les espaces avant et après
    
            // Vérifier si le libellé est vide
            if (empty($libelle)) {
                // Gérer l'erreur de libellé vide (vous pouvez ajouter une redirection avec un message d'erreur, par exemple)
                header('Location: /add_category?error=empty'); // Redirection vers le formulaire d'ajout avec un message d'erreur
                exit();
            }
    
            // Si le libellé n'est pas vide, procéder à l'ajout de la catégorie
            $categorieDAO = new CategorieDAO();
            $categorieDAO->addCategorie($libelle);
    
            // Redirection vers la liste des catégories après l'ajout
            header('Location: /list_categories');
            exit();
        }
    }

    public function list() {
        $categorieDAO = new CategorieDAO();
        $categories = $categorieDAO->getListCategories();
        
        require 'views/list_categories.php';
    }

    public function delete($id) {
        // Vérifiez si la méthode est un POST (pour éviter les suppressions accidentelles via GET)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categorieDAO = new CategorieDAO();
            
            // Supprimer la catégorie par son ID
            $categorieDAO->deleteCategorie($id);
            
            // Redirection vers la liste des catégories après suppression
            header('Location: /list_categories');
            exit();
        }
    }
    
    public function confirmDelete($id) {
        $categorieDAO = new CategorieDAO();
        $categorie = $categorieDAO->getCategorieById($id);
        
        require 'views/confirm_delete.php';
    }

     // Méthode pour afficher le formulaire de modification de catégorie
     public function edit($id) {
        // Instanciation du DAO de catégorie
        $categorieDAO = new CategorieDAO();
        
        // Récupération de la catégorie à éditer
        $categorie = $categorieDAO->getCategorieById($id);
        
        // Vérification si la catégorie existe
        if (!$categorie) {
            // Redirection vers une page d'erreur ou une autre page appropriée si la catégorie n'existe pas
            header('Location: /list_categories');
            exit();
        }
        
        // Préparation des données pour l'affichage dans le formulaire
        $libelle = htmlspecialchars($categorie->libelle);
        
        // Inclusion de la vue pour afficher le formulaire de modification
        require 'views/edit_category.php';
    }

    // Méthode pour mettre à jour une catégorie
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $id = $_POST['id'];
            $libelle = trim($_POST['libelle']); // Utilisation de trim pour enlever les espaces avant et après
            
            // Vérification si le libellé est vide
            if (empty($libelle)) {
                // Gestion de l'erreur de libellé vide (vous pouvez ajouter une redirection avec un message d'erreur, par exemple)
                header('Location: /edit_category.php?id=' . $id . '&error=empty'); // Redirection vers le formulaire d'édition avec un message d'erreur
                exit();
            }
    
            // Instanciation du DAO de catégorie
            $categorieDAO = new CategorieDAO();
    
            // Récupération de la catégorie à mettre à jour
            $categorie = $categorieDAO->getCategorieById($id);
    
            // Vérification si la catégorie existe
            if (!$categorie) {
                // Redirection vers une page d'erreur ou une autre page appropriée si la catégorie n'existe pas
                header('Location: /list_categories');
                exit();
            }
    
            // Mise à jour de la catégorie avec le nouveau libellé
            $categorie->libelle = $libelle;
            $categorieDAO->updateCategorie($categorie);
    
            // Redirection vers la liste des catégories après la modification
            header('Location: /list_categories');
            exit();
        }
    }

}
?>