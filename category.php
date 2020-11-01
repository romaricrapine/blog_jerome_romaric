<?php

require('function.php');
require_once('database.php');

$catego = selectCategory();


// Selectionner les catagory pour les afficher dans le select

$categories = $connect->query('SELECT slug, category_name FROM category');

$articles = $connect->prepare('SELECT * FROM article INNER JOIN category ON article.category_id = category.id WHERE category.slug = ?');


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
                                <a href="category.php?<?= $value['slug']; ?>"><?php echo $value['category_name']; ?></a>
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
            
            <?php

                if (isset($_GET['html'])){
                    $articles->execute(['html']);
                    while ($art = $articles->fetch()){
                        echo "<strong><h1>"  .  $art['title'] . "</h1></strong>";
                        echo $art['content'];echo "<br>";
                        echo "<br>";
                    }
                }

                if (isset($_GET['css'])){
                    $articles->execute(['css']);
                    while ($art = $articles->fetch()){
                        echo "<strong><h1>"  .  $art['title'] . "</h1></strong>";
                        echo $art['content'];echo "<br>";
                        echo "<br>";
                    }
                }

                if (isset($_GET['javascript'])){
                    $articles->execute(['javascript']);
                    while ($art = $articles->fetch()){
                        echo "<strong><h1>"  .  $art['title'] . "</h1></strong>";
                        echo $art['content'];echo "<br>";
                        echo "<br>";
                    }
                }

                if (isset($_GET['php'])){
                    $articles->execute(['php']);
                    while ($art = $articles->fetch()){
                        echo "<strong><h1>"  .  $art['title'] . "</h1></strong>";
                        echo $art['content'];echo "<br>";
                        echo "<br>";
                    }
                }

                if (isset($_GET['mysql'])){
                    $articles->execute(['mysql']);
                    while ($art = $articles->fetch()){
                        echo "<strong><h1>"  .  $art['title'] . "</h1></strong>";
                        echo $art['content'];echo "<br>";
                        echo "<br>";
                    }
                }

                ?>

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