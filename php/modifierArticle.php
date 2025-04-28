<?php
require_once("php/article.class.php");

if (isset($_POST['modifier'])) {
    // On modifie un article existant
    $id = $_POST['article_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $categorie = $_POST['categorie'];
    $quantity = $_POST['quantity'];
    $imageName = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($_FILES['image']['type'], $allowedTypes)) {
            $imageName = uniqid() . "_" . basename($_FILES['image']['name']);
            $imagePath = 'assets/images/' . $imageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        } else {
            echo "Type d'image non autorisé.";
            exit();
        }
    } else {
        $imageName = $_POST['old_image'];
    }

    $article = new Article();
    $article->updateArticle($id, $name, $price, $size, $color, $categorie, $quantity, $imageName);
}
?>