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
        public function addCategorie(){
            $categorie = new Categorie();
            $req = $this->bdd->prepare('INSERT INTO categorie(libelle) VALUES(?)');
            $req->bind_param('s', $categorie->libelle);
            $req->execute();
           
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