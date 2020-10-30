<?php

require('function.php');

$catego = selectCategory();

// Connexion à la base de donnée

$connect = new PDO('mysql:host=mysql;dbname=database_exo;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// Selectionner les catagory pour les afficher dans le select

$categories = $connect->query('SELECT category_name FROM category');

$articles = $connect->query('SELECT * FROM article INNER JOIN category ON article.category_id = category.id');

?>


<!DOCTYPE html>
<html lang="FR-fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--<link rel="stylesheet" href=https://necolas.github.io/normalize.css/latest/normalize.css> -->
    <link rel="stylesheet" href="style.css">
    <title>Category</title>
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
                            <li value="<?php echo $value; ?>">
                                <a href="category.php?<?= $value['category_name']; ?>"><?php echo $value['category_name']; ?></a>
                            </li>
                        <?php } ?>
                        <li>
                            <a class="nav-pl-0" href="createArticle.php">Create post</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
        <!--  Suite du html "main page" -->
        <main class="col-10 offset-1 mt-5">

            <!-- TODO: FAIRE LAFFICHAGE DE CONTENU EN FONCTION DU SLUG -->

<!--    if (isset($_GET['HTML'])){
    echo "Nous sommes en HTML";
} elseif (isset($_GET['CSS'])) {
    echo "Nous sommes en CSS";
} elseif (isset($_GET['JavaScript'])) {
    echo "Nous sommes en JavaScript";
} elseif (isset($_GET['PHP'])) {
    echo "Nous sommes en PHP";
} elseif (isset($_GET['MySql'])) {
    echo "Nous sommes en MySql";
} else {
    echo "non toujours pas";
}
        -->

            <?php while ($donnees = $articles->fetch()): ?>
                <div class="col-2 mt-3">
                    <h4>
                        <?php
                        if (isset($_GET['HTML'])){

                            $html = $connect->query("SELECT title FROM article WHERE category_id = 1");

                            echo "Nous sommes en html";
                        } elseif (isset($_GET['CSS'])) {
                            echo "Nous sommes en CSS";
                        } elseif (isset($_GET['JavaScript'])) {
                            echo "Nous sommes en JavaScript";
                        } elseif (isset($_GET['PHP'])) {
                            echo "Nous sommes en PHP";
                        } elseif (isset($_GET['MySql'])) {
                            echo "Nous sommes en MySql";
                        } else {
                            echo "non toujours pas";
                        }
                        ?>
                    </h4>
                </div>
                <div class="col mt-3 mb-5">
                    <?php
                    if (isset($_GET['HTML'])){
                        echo "Nous sommes en CSS";
                    } elseif (isset($_GET['CSS'])) {
                        echo "Nous sommes en CSS";
                    } elseif (isset($_GET['JavaScript'])) {
                        echo "Nous sommes en JavaScript";
                    } elseif (isset($_GET['PHP'])) {
                        echo "Nous sommes en PHP";
                    } elseif (isset($_GET['MySql'])) {
                        echo "Nous sommes en MySql";
                    } else {
                        echo "non toujours pas";
                    }
                    ?>
                    <br>
                    <a href="#">
                        <?php
                        /* TODO : FINIR CE BOUTON DE MERDE
                        if (isset($_GET['HTML'])){
                            echo "Read more" . "+" . $donnees['id'];
                        } elseif (isset($_GET['CSS'])) {
                            echo "Nous sommes en CSS";
                        } elseif (isset($_GET['JavaScript'])) {
                            echo "Nous sommes en JavaScript";
                        } elseif (isset($_GET['PHP'])) {
                            echo "Nous sommes en PHP";
                        } elseif (isset($_GET['MySql'])) {
                            echo "Nous sommes en MySql";
                        } else {
                            echo "non toujours pas";
                        }*/
                        ?>
                    </a>
                </div>
            <?php endwhile; ?>


        </main>
    </diV>
</div>
<!-- footer -->
<div class="card-2">
    <div class="card-body">
        <p>&copy Romaric & Jérome</p>
    </div>
</div>

</body>

</html>