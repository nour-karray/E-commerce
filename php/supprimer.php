<?php
require_once("panier.class.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $panier = new Panier();
    $panier->supprimerArticle($id);

    header("Location: ../cart.php");
    exit;
}
?>