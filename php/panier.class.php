<?php
class Panier
{
    public $id;
    public $id_user;
    public $id_article;
    public $quantity;
    public $dateCommande;

    public function ajouterArticle()
    {
        require_once("pdo.php");
        $cnx = new connexion();
        $pdo = $cnx->cnxBase();

        // Insérer dans le panier (sans prepare)
        $sql = "INSERT INTO panier (id_user, id_article, quantity, dateCommande)
                VALUES (
                    '$this->id_user',
                    '$this->id_article',
                    '$this->quantity',
                    '$this->dateCommande'
                )";

        $pdo->exec($sql) or die(print_r($pdo->errorInfo()));
    }


    public function listePanier($userId)
    {
        require_once("pdo.php");
        $cnx = new connexion();
        $pdo = $cnx->cnxBase();

        // Joindre avec articles pour récupérer toutes les infos
        $sql = "SELECT panier.id, panier.quantity, panier.dateCommande, 
                       articles.name, articles.price, articles.size, articles.color, articles.image
                FROM panier
                INNER JOIN articles ON panier.id_article = articles.id
                WHERE panier.id_user = '$userId'
                ORDER BY panier.id DESC";

        $result = $pdo->query($sql);
        return $result;
    }

    public function supprimerArticle($id)
    {
        require_once("pdo.php");
        $cnx = new connexion();
        $pdo = $cnx->cnxBase();

        $sql = "DELETE FROM panier WHERE id = $id";

        $pdo->exec($sql) or die(print_r($pdo->errorInfo()));
    }

    public function viderPanier($userId)
    {
        require_once("pdo.php");
        $cnx = new connexion();
        $pdo = $cnx->cnxBase();

        // Vider tout le panier d'un utilisateur
        $sql = "DELETE FROM panier WHERE id_user = '$userId'";

        $pdo->exec($sql) or die(print_r($pdo->errorInfo()));
    }
}
?>