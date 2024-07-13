<?php

require_once 'models/dao/ConnexionManager.php';
require_once 'models/domain/Article.php';

class ArticleDao {
    private $bdd;

    public function __construct() {
        $this->bdd = (new ConnexionManager())::getInstance();
    }

    public function getListArticles($limit = 5, $offset = 0) {
        $articles = array();
        $stmt = $this->bdd->prepare('SELECT * FROM article ORDER BY dateCreation DESC LIMIT ? OFFSET ?');
        $stmt->bind_param('ii', $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($data = $result->fetch_assoc()) {
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

    public function getTotalArticlesCount() {
        $result = $this->bdd->query('SELECT COUNT(*) as count FROM article');
        $data = $result->fetch_assoc();
        return $data['count'];
    }

    public function getArticleById($id) {
        $stmt = $this->bdd->prepare('SELECT * FROM article WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Check if a row was returned
        if ($result->num_rows == 0) {
            return null; // No article found with the given id
        }
    
        $data = $result->fetch_assoc();
    
        $article = new Article();
        $article->id = $data['id'];
        $article->titre = $data['titre'];
        $article->contenu = $data['contenu'];
        $article->categorie = $data['categorie'];
        $article->dateCreation = $data['dateCreation'];
        $article->dateModification = $data['dateModification'];
    
        return $article;
    }
    

    public function getArticlesByCategorie($idCategorie) {
        $articles = array();
        $stmt = $this->bdd->prepare('SELECT * FROM article WHERE categorie = ?');
        $stmt->bind_param('i', $idCategorie);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($data = $result->fetch_assoc()) {
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

    public function addArticle($article) {
        $stmt = $this->bdd->prepare('INSERT INTO article(titre, contenu, categorie, dateCreation, dateModification) VALUES(?, ?, ?, ?, ?)');
        $stmt->bind_param('ssiss', $article->titre, $article->contenu, $article->categorie, $article->dateCreation, $article->dateModification);
        $stmt->execute();
    }

    public function updateArticle($article) {
        $stmt = $this->bdd->prepare('UPDATE article SET titre = ?, contenu = ?, categorie = ?, dateModification = ? WHERE id = ?');
        $stmt->bind_param('sssii', $article->titre, $article->contenu, $article->categorie, $article->dateModification, $article->id);
        $stmt->execute();
    }
    public function deleteArticle($id) {
        $stmt = $this->bdd->prepare('DELETE FROM article WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}

?>