<?php
require('function.php');

$connect = new PDO('mysql:host=mysql;dbname=database_exo;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$catego = selectCategory();

// chek id dans la barre
if(isset($_GET['id']) && !empty($_GET['id'])){

    $id = ($_GET['id']);

    // on séléct les id dans article
    $sql = "SELECT * FROM article WHERE id = :id";

    // On prépare la requête
    $query = $connect->prepare($sql);

    // On donne une valeur à (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    $article = $query->fetch();

    $sql = "DELETE FROM articles WHERE id = :id";

    // On prépare la requête
    $query = $connect->prepare($sql);

    // On donne une valeur à (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();
    $message['message'] = "Votre article a bien été supprimé";
}else{
    $message['erreur'] = "URL invalide";
}



?>
