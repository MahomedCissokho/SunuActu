<?php
    require_once 'ConnexionManager.php';

    class ArticleDao {
        private $bdd;

        public function __construct(){
            $this->bdd = (new ConnexionManager())::getInstance();
        }
        public function getListArticles(){
            $articles = array();
            $req = $this->bdd->query('SELECT * FROM article');
            while($data = $req->fetch_assoc()){
                $article = new Article();
                $article->id = $data['id'];
                $article->titre = $data['titre'];
                $article->contenu = $data['contenu'];
                $article->categorie = $data['categorie'];
                $article->dateCreation = $data['dateCreation'];
                $article->dateModification = $data['dateModification'];
                $articles[] = $article;
            }
            return $articles;
        }
        public function getArticleById($id){
            $req = $this->bdd->query('SELECT * FROM article WHERE id = '.$id);
            $data = $req->fetch_assoc();
            $article = new Article();
            $article->id = $data['id'];
            $article->titre = $data['titre'];
            $article->contenu = $data['contenu'];
            $article->categorie = $data['categorie'];
            $article->dateCreation = $data['dateCreation'];
            $article->dateModification = $data['dateModification'];
            return $article;

        }
        public function getArticlesByCategorie($idCategorie){
            $articles = array();
            $req = $this->bdd->query('SELECT * FROM article WHERE categorie = '.$idCategorie);
            while($data = $req->fetch_assoc()){
                $article = new Article();
                $article->id = $data['id'];
                $article->titre = $data['titre'];
                $article->contenu = $data['contenu'];
                $article->categorie = $data['categorie'];
                $article->dateCreation = $data['dateCreation'];
                $article->dateModification = $data['dateModification'];
                $articles[] = $article;
            }
            return $articles;

        }
        public function addArticle(){
            $article = new Article();
            $req = $this->bdd->prepare('INSERT INTO article(titre, contenu, categorie, dateCreation, dateModification) VALUES(?, ?, ?, ?, ?)');
            $req->bind_param('ssiss', $article->titre, $article->contenu, $article->categorie, $article->dateCreation, $article->dateModification);

            $req->execute();

        }
        public function updateArticle($article){
            $req = $this->bdd->prepare('UPDATE article SET titre = ?, contenu = ?, categorie = ?, dateModification = ? WHERE id = ?');
            $req->bind_param('sssii', $article->titre, $article->contenu, $article->categorie, $article->dateModification, $article->id);
            $req->execute();

        }
        public function deleteArticle($id){
            $req = $this->bdd->prepare('DELETE FROM article WHERE id ='. $id);
            $req->execute();
        }

    }

?>