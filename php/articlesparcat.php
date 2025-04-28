<?php
require_once("article.class.php");
require_once("categorie.class.php");

// Récupérer le nom de la catégorie depuis l'URL
$categoryName = isset($_GET['categorie']) ? $_GET['categorie'] : null;

$article = new Article();
$categorie = new Categorie();

// Si une catégorie est définie, récupérer les articles de cette catégorie
if ($categoryName) {
    $produits = $article->listeArticleParCategorie($categoryName); // Récupérer les articles par catégorie
} else {
    $produits = $article->listeArticle(); // Récupérer tous les articles si aucune catégorie n'est définie
}

$categories = $categorie->ListeCategorie(); // Charger les catégories disponibles
?>
ssssssssssssssss