<?php
require_once("php/article.class.php");

if (isset($_POST['ajouter'])) {
    // Récupération des données du formulaire
    $name = $_POST['name'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $categorie = $_POST['categorie'];
    $quantity = $_POST['quantity'];
    $imageName = '';

    // Vérification du téléchargement de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        
        // Validation du type d'image
        if (in_array($_FILES['image']['type'], $allowedTypes)) {
            // Définir un nom d'image unique pour éviter les conflits
            $imageName = uniqid() . "_" . basename($_FILES['image']['name']);
            $imagePath = 'assets/images/' . $imageName;

            // Déplacement de l'image dans le dossier
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                echo "Erreur lors du téléchargement de l'image.";
                exit();
            }
        } else {
            echo "Type d'image non autorisé. Veuillez télécharger un fichier JPG, PNG ou GIF.";
            exit();
        }
    }

    // Création de l'objet Article
    $article = new Article();
    $article->name = $name;
    $article->price = $price;
    $article->size = $size;
    $article->color = $color;
    $article->categorie = $categorie;
    $article->Quantity = $quantity;
    $article->image = $imageName;

    // Insertion de l'article dans la base de données
    $article->insertArticle();
}

// Charger tous les produits
$article = new Article();
$produits = $article->listeArticle();
?>
