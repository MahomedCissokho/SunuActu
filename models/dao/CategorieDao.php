<?php
    require_once 'ConnexionManager.php';
    require_once 'models/domain/Categorie.php';

    class CategorieDao {

        private $bdd;
        public function __construct(){
            $this->bdd = (new ConnexionManager())::getInstance();
        }
        public function getListCategories(){
           $categories = array();
              $req = $this->bdd->query('SELECT * FROM categorie');
                while($data = $req->fetch_assoc()){
                    $categorie = new Categorie();
                    $categorie->id = $data['id'];
                    $categorie->libelle = $data['libelle'];
                    $categories[] = $categorie;
                }
            return $categories;
        }
        public function getCategorieById($id){
            $categorie = new Categorie();
            $req = $this->bdd->query('SELECT * FROM categorie WHERE id = '.$id);
            $data = $req->fetch_assoc();
            $categorie->id = $data['id'];
            $categorie->libelle = $data['libelle'];
            return $categorie;
        }
        public function addCategorie($libelle) {
            // Création de l'objet Categorie et définition du libellé
            $categorie = new Categorie();
            $categorie->libelle = $libelle;
        
            // Préparation de la requête SQL
            $sql = 'INSERT INTO categorie (libelle) VALUES (?)';
            $stmt = $this->bdd->prepare($sql);
        
            if ($stmt === false) {
                // Gestion des erreurs de préparation de la requête
                die('Erreur de préparation de la requête : ' . $this->bdd->error);
            }
        
            // Liaison des paramètres et exécution de la requête
            $stmt->bind_param('s', $categorie->libelle);
            $stmt->execute();
        
            if ($stmt->affected_rows > 0) {
                // Succès de l'insertion
                echo 'Catégorie ajoutée avec succès !';
            } else {
                // Gestion des erreurs d'insertion
                echo 'Erreur lors de l\'ajout de la catégorie : ' . $stmt->error;
            }
        
            // Fermeture du statement
            $stmt->close();
        }
        
        public function updateCategorie($categorie){
            $req = $this->bdd->prepare('UPDATE categorie SET libelle = ? '. 'WHERE id = '.$categorie->id);
            $req->bind_param('s', $categorie->libelle);
            $req->execute();
        }
        public function deleteCategorie($idCategorie){
            $req = $this->bdd->prepare('DELETE FROM categorie WHERE id = '.$idCategorie);
            $req->execute();
        }

    }
?>