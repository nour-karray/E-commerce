<?php
class Categorie
{
    public $nameCat;

    public function ListeCategorie()
    { {
            require_once("pdo.php");
            $cnx = new connexion();
            $pdo = $cnx->cnxBase();

            $req = $pdo->query("SELECT * FROM categorie ORDER BY nameCat DESC");
            return $req;
        }
    }


    public function countArticles($categorieId)
    {
        require_once("pdo.php");
        $cnx = new connexion();
        $pdo = $cnx->cnxBase();

        $req = $pdo->query("SELECT COUNT(*) AS total FROM articles WHERE categorie = $categorieId");
        $row = $req->fetch(PDO::FETCH_ASSOC);

        return $row['total'];
    }
}
?>