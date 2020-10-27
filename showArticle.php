<?php
$pdo = new PDO('mysql:host=mysql;dbname=database_exo;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$article = $pdo->query('SELECT * FROM article ORDER BY slug');

?>
    <!DOCTYPE html>
    <html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<ul>
    <?php while($a = $article->fetch()){?>

        <li class="li">
            <a href="showArticle.php?=<?= $a['slug'] ?>"> <?= $a['title'] ?></a>
        </li>
    <?php } ?>

</ul>

</body>
</html>
