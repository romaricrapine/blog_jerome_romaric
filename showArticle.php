<?php
require('function.php');
require_once('database.php');

$catego = selectCategory();

$categories = $connect->query('SELECT slug, category_name FROM category');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $get_id = htmlspecialchars($_GET['id']);
    $article = $connect->prepare('SELECT * FROM article WHERE id = ?');
    $article->execute(array($get_id));
    if($article->rowCount() == 1){
        $article = $article->fetch();
        $title = $article['title'];
        $content = $article['content'];
    }else{
        die("Cet article n'existe pas !");
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--<link rel="stylesheet" href=https://necolas.github.io/normalize.css/latest/normalize.css> -->
    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
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
            <a href="F.A.Q">F.A.Q</a>
        </li>
    </ul>
</nav>

<!-- header-->

<div class="header">
</div>

<!-- sidebar -->
<div class="container-fluid">
    <div class="row">
        <aside class="col-12 col-md-1 p-0 mt-5">
            <nav class="navbar navbar-expand navbar-dark flex-md-column flex-row align-items-start">
                <div class="collapse navbar-collapse">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                        <li>
                            <p class="nav-pl-0 categoliste">Categories</p>
                        </li>
                        <?php foreach($categories as $value):  ?>
                            <li value="<?php echo $value; ?>">
                                <a href="category.php?<?= $value['slug']; ?>"><?php echo $value['category_name']; ?></a>
                            </li>
                        <?php endforeach; ?>
                        <li>
                            <a class="nav-pl-0" href="createArticle.php">Create post</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
        <!--  Suite du html "main page" -->
        <main class="col-10 offset-1 mt-5">

            <h1><?= $title ?></h1>
            <p><?= $content ?></p>

        </main>
    </div>
</div>
<!-- footer -->
<div class="card-2">
    <div class="card-body">
        <p>&copy Romaric & Jérome</p>
    </div>
</div>

</body>

</html>