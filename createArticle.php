<?php
require('function.php'); //test git

$catego = selectCategory();

// Connexion à la base de donnée

$connect = new PDO('mysql:host=mysql;dbname=database_exo;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// Selectionner les catagory pour les afficher dans le select

$categories = $connect->query('SELECT * FROM category');

$categories2 = $connect->query('SELECT * FROM category');

if ($_POST) {

    $getCat = $_POST["category"];
    $catId = intval($getCat);
    $title = ($_POST['title']);
    $content = ($_POST['content']);
    $slug = creatSlug($title);

    if(isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['content']) && !empty($_POST['content'])
        && isset($_POST['category']) && ($_POST['category'])) {

        // Insertion des informations dans les colonnes et de la table
        $sql = "INSERT INTO article (title, content, created_at, category_id, slug) VALUES (:title, :content, NOW(), :category_id, :slug)";
        $query = $connect->prepare($sql);

        // On indique des paramètres
        $query->bindValue(':title', $title);
        $query->bindValue(':content', $content);
        $query->bindValue(':category_id', $catId);
        $query->bindValue(':slug', $slug);

        // On execute
        $query->execute();

        $message['message'] = "Félicitation votre article a bien été ajouter !";
    } else {
        $message['erreur'] = "L'article n'est pas complet, merci de recommencer !";
    }
}


?>

<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--<link rel="stylesheet" href=https://necolas.github.io/normalize.css/latest/normalize.css> -->
    <link rel="stylesheet" href="style.css">
    <title>New post</title>
</head>

<body>
<!--  nav   -->

<nav>
    <ul>
        <li>
            <a href="home.php">Home</a>
        </li>
        <li>
            <a href="about.html">About us</a>
        </li>
        <li>
            <a href="showArticle.php">Articles</a>
        </li>
        <li>
            <a href="F.A.Q">F.A.Q</a>
        </li>
    </ul>
</nav>

<!-- header-->

<div class="header">
</div>

<!-- sidebar -->

<div class="container-fluid">
    <diV class="row">
        <aside class="col-12 col-md-1 p-0 mt-5">
            <nav class="navbar navbar-expand navbar-dark flex-md-column flex-row align-items-start">
                <div class="collapse navbar-collapse">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                        <li>
                            <p class="nav-pl-0 categoliste">Catégorie</p>
                        </li>
                        <?php foreach($categories as $value){ ?>
                            <li value="<?php echo $value; ?>"><a href="category.php?category=<?= $value['category_name']; ?>"><?php echo $value['category_name']; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </aside>
        <!-- Main html-->
        <main class="col-10 offset-1 mt-5">
            <div class="col-6 offset-2">
                <h4>Post an article</h4>
                <form method="post" action="createArticle.php">
                    <div class="form-group">
                        <input class="titre-postarticles" type="text" name="title" placeholder="Enter a title for your post">
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="category">
                            <option type="text">Choisir une Catégorie</option>
                            <?php foreach($categories2 as $value): ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="6" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" value="Submit" class="btn btn-secondary">submit</button>
                    </div>
                </form>


        </main>
    </diV>
</div>
<div class="card-2">
    <div class="card-body">
        <p>&copy Romaric & Jérome</p>
    </div>
</div>

</body>

</html>