<?php
require_once("article.class.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $article = new Article();

    $article->deleteArticle($id);

    header("Location: ../index.php");
    exit;
}
?>