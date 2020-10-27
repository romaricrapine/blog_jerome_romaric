<?php

// Création de la function pour les slugs

function creatSlug($string, $delimiter = '-')
{
    $oldLocale = setlocale(LC_ALL, '0');
    setlocale(LC_ALL, 'en_US.UTF-8');
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower($clean);
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
    $clean = trim($clean, $delimiter);
    setlocale(LC_ALL, $oldLocale);
    return $clean;
}

function selectCategory()
{
    try {
        // Connexion à la base
        $connect = new PDO('mysql:host=localhost;dbname=database_exo', 'root', '');
        $connect->exec('SET NAMES "UTF8"');
    } catch (PDOException $i) {
        echo 'Erreur : ' . $i->getMessage();
        die();
    }

    // selection de toutes les colonnes de la table category
    $sql = "SELECT * FROM category";
// On prépare la requête
    $query = $connect->prepare($sql);

// On exécute la requête
    $query->execute();

// On stocke le résultat dans un tableau
    $catego = $query->fetchAll();

    return $catego;
}

?>

