<?php
require('function.php');

// Connexion à la base de donnée

$connect = new PDO('mysql:host=mysql;dbname=database_exo;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

?>

<a href="createArticle.php">ICI</a>