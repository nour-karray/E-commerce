<?php
class Article
{
    public $id;
    public $name;
    public $price;
    public $size;
    public $color;
    public $categorie;
    public $Quantity;
    public $image;

    public function insertArticle()
    {
        require_once("pdo.php");
        $cnx = new connexion();
        $pdo = $cnx->cnxBase();

        // Construire la requête d'insertion sans préparer
        $req = "INSERT INTO articles(name, price, size, color, categorie, Quantity, image) 
                VALUES (
                    '$this->name',
                    '$this->price',
                    '$this->size',
                    '$this->color',
                    '$this->categorie',
                    '$this->Quantity',
                    '$this->image'
                )";

        // Exécution de la requête directement
        $pdo->exec($req) or die(print_r($pdo->errorInfo()));
    }

    // Liste des articles
    public function listeArticle()
    {
        require_once("pdo.php");
        $cnx = new connexion();
        $pdo = $cnx->cnxBase();

        $req = $pdo->query("SELECT * FROM articles ORDER BY id DESC");
        return $req;
    }
    public function listeArticleParCategorie($categorie)
    {
        require_once("pdo.php");
        $cnx = new connexion();
        $pdo = $cnx->cnxBase();

        $sql = "SELECT * FROM articles WHERE categorie = '$categorie' ORDER BY id DESC";
        $result = $pdo->query($sql);
        return $result;

    }
    public function deleteArticle($id)
    {
        require_once("pdo.php");
        $cnx = new connexion();
        $pdo = $cnx->cnxBase();

        // Requête SQL pour supprimer un article par son id
        $sql = "DELETE FROM articles WHERE id = $id";

        // Exécution de la requête
        $pdo->exec($sql) or die(print_r($pdo->errorInfo()));
    }
    public function updateArticle($id, $name, $price, $size, $color, $categorie, $quantity, $imageName)
    {
        require_once("pdo.php");
        $cnx = new connexion();
        $pdo = $cnx->cnxBase();

        // Requête SQL pour mettre à jour l'article
        $sql = "UPDATE articles 
                SET name = '$name', price = '$price', size = '$size', color = '$color', categorie = '$categorie', quantity = '$quantity', image = '$imageName' 
                WHERE id = $id";

        // Exécution de la requête
        $pdo->exec($sql) or die(print_r($pdo->errorInfo()));
    }
    public function getArticleById($id)
    {
        require_once("pdo.php");
        $cnx = new connexion();
        $pdo = $cnx->cnxBase();

        // Récupérer l'article par son id
        $sql = "SELECT * FROM articles WHERE id = $id";
        $result = $pdo->query($sql);

        return $result;
    }

}
?>
ssssssssssssssss