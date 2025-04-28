<?php
require_once("panier.class.php");

// Client statique pour tester
$userId = 1; // (plus tard tu peux utiliser $_SESSION['user']['id'])

if (isset($_POST['article_id'])) {
    $articleId = $_POST['article_id'];
    $quantity = $_POST['quantity'];

    $panier = new Panier();
    $panier->id_user = $userId;
    $panier->id_article = $articleId;
    $panier->quantity = $quantity;
    $panier->dateCommande = date('Y-m-d H:i:s'); // date actuelle

    $panier->ajouterArticle();

    header("Location: ../cart.php"); // Redirection vers panier
    exit;
}
?>
