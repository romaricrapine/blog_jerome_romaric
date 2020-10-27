<?php
require('function.php');

$catego = selectCategory();

// Connexion à la base de donnée

$connect = new PDO('mysql:host=mysql;dbname=database_exo;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

if($_POST){

    $id = ($_POST['id']);
    $title = ($_POST['title']);
    $content = ($_POST['content']);
    $category = ($_POST['category']);

    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['content']) && !empty($_POST['content'])
        && isset($_POST['category']) && !empty($_POST['category'])){

        $sql = "UPDATE article SET title = :title, content = :content, updated_at = NOW(),category_id = :category, slug = :slug WHERE id = :id";

        $query = $connect->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':content', $content, PDO::PARAM_STR);
        $query->bindValue(':category', $category, PDO::PARAM_INT);

        $query->execute();

        $message['message'] = "Article modifié";
    } else {
        $message['erreur'] = "Le formulaire est incomplet";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Article</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<main class="container">
    <div class="row">
        <section class="col-12">
            <?php
            if(!empty($message['erreur'])){
                echo '<div class="alert alert-danger" role="alert">
                                '. $message['erreur'].'
                            </div>';
                $message['erreur'] = "";
            }
            ?>
            <h1>Modifier un Article</h1>
            <br>
            <form method="POST">
                <div class="form-group">
                    <label for="title">Titre de l'article :</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= $title['title']?>">
                </div>
                <div class="form-group">
                    <label for="content">Article :</label>
                    <input type="text" id="content" name="content" class="form-control" value="<?= $content['content']?>">
                </div>
    </div><br><hr>
    <div class="form-group">
        <select class="form-control" name="category">
            <option type="text" value="<?= $title['category_id']?>">Choisir une catégorie</option>
            <?php foreach($catego as $category ): ?>
                <option ><?= $category['id'] ?> : <?= $category['category_name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="hidden" value="<?= $title['id']?>" name="id">
    <button class="btn btn-primary">Envoyer</button>
    </form>
    </section>
    </div>
    
</main>

<div class="card-2">
    <div class="card-body">
        <p>&copy Romaric & Jérome</p>
    </div>
</div>


</body>
</html>
