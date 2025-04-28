<?php
require_once("categorie.class.php");

if (isset($_GET['id'])) {
    $categorieId = $_GET['id']; 

    $categorie = new Categorie();
    $count = $categorie->countArticles($categorieId);

    echo $count;
} else {
    echo "ID catégorie manquant.";
}
?>